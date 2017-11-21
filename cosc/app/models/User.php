<?php

class User {

    public $username="";
    public $password="";
    public $auth = false;
    public function __construct() {

    }

    public function authenticate() {
        /*
         * if username and password good then
         * $this->auth = true;
         */

        if($this->isLocked()==true){
            //locked, do nothing
        }elseif($this->isLocked()==false){
            $this->Userlogin();
        }

    }
    public function isLocked(){

        $db = db_connect();


        //checking if user attempted 3 times in last hour minutes


        $beforeOneHour = time() - (60*60);
        $statement = $db->prepare("select * from regLogs
                                WHERE username = :name AND stat = '0' AND date > :date ORDER by date DESC ;
                ");
        $statement->bindValue(':name', $this->username);
        $statement->bindValue(':date', $beforeOneHour);
        $statement->execute();
        $numAttempts = $statement->fetch();

            if($statement->rowCount()>=3){
                //checking time left
                $currTime = time();
                $lockTime = $numAttempts['date'];
                $lockTime = $lockTime + (60);
                if($lockTime > $currTime){
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }

    }
    public function Userlogin(){
        $db = db_connect();
        $statement = $db->prepare("select * from users
                                WHERE username = :name;
                ");
        $statement->bindValue(':name', $this->username);
        $statement->execute();
        $usrs = $statement->fetch();

        if(isset($usrs[0])) {
            if (password_verify($this->password, $usrs[1])) {
                $_SESSION['usr'] = $this->username;
                $_SESSION['pass'] = $this->password;
                $_SESSION['isAdmin'] = $usrs[2];
                $this->auth = true;


                $this->regAttempt(true);
                $statment = $db ->prepare(" SELECT * FROM regLogs ORDER BY `date` DESC;
                                ");
                $date = time() -(60*60*24);
                $statment->bindValue(':date', $date);
                try { $statment->execute();}
                catch(PDOException $e){echo $e->getMessage();}
                $login = $statment->fetchAll();
                $_SESSION['lastLogin'] = $login[1][0];



            }else{
                $_SESSION['usr'] = $this->username;
                $_SESSION['pass'] = $this->password;
                $this->regAttempt(false);
            }
        }else{
            $_SESSION['usr'] = $this->username;
            $_SESSION['pass'] = $this->password;
            $this->regAttempt(false);
        }
    }

    public function regAttempt($isValid){
        $db = db_connect();
        if($isValid==true){
            $statement = $db->prepare("INSERT INTO regLogs (date, username, stat, logType)
                                values(:currdate, :username, :stat, :type);
                ");
            $statement->bindValue(':currdate', time());
            $statement->bindValue(':username', $this->username);
            $statement->bindValue(':stat', 1);
            $statement->bindValue(':type', "login");
            $statement->execute();

        }else{
            $statement = $db->prepare("INSERT INTO regLogs (date, username, stat, logType)
                                values(:currdate, :username, :stat, :type);
                ");
            $statement->bindValue(':currdate', time());
            $statement->bindValue(':username', $this->username);
            $statement->bindValue(':stat', 0);
            $statement->bindValue(':type', "login");
            $statement->execute();
        }
    }
	public function register ($username, $password) {

        $dbh = db_connect();
        $ISAVAIL = $dbh->prepare("SELECT username FROM users WHERE username = :name");
        $ISAVAIL->bindValue(':name', $username);
        $ISAVAIL->execute();
        $res = $ISAVAIL->rowCount();
        if($res>0){
            //username already taken
        }else if (strlen($password) < 8 || strlen($username)<=4) {
        //password minimum requirment not met!
    }else{
            $securePass = password_hash($password, PASSWORD_DEFAULT);
            $db = db_connect();
            $statement = $db->prepare("INSERT INTO users ( username, password ) 
                                      values (:name, :pass)");

            $statement->bindValue(':name', $username);
            $statement->bindValue(':pass', $securePass);
            $statement->execute();
        }



	}

}
