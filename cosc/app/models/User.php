<?php

class User {

    public $username="";
    public $password="";
    public $auth = false;
    public $attempts=0;
    public $lockedUntil=0;
    public function __construct() {
        
    }

    public function authenticate() {
        /*
         * if username and password good then
         * $this->auth = true;
         */


        if($this->lockedUntil >= time()){
            //locked
        }else{


		$db = db_connect();
        $statement = $db->prepare("select * from users
                                WHERE username = :name;
                ");
        $statement->bindValue(':name', $this->username);
        $statement->execute();
        $usrs = $statement->fetch();

        if(isset($usrs[0])) {
            if (password_verify($this->password, $usrs[1])) {
                $_SESSION['usr']=$this->username;
                $_SESSION['pass']=$this->password;
                $this->auth=true;
                $_SESSION['attempts']=0;
                $statement = $db->prepare("INSERT INTO regLogs (date, username, stat, logType)
                                values(:currdate, :username, :stat, :type);
                ");
                $statement->bindValue(':currdate', date('Y-m-d H:i:s'));
                $statement->bindValue(':username', $this->username);
                $statement->bindValue(':stat', 1);
                $statement->bindValue(':type', "login");
                $statement->execute();
            }else{
                $this->attempt();
            }
        }else{
            $this->attempt();
        }
       }
    }
	public function attempt(){

            if($this->attempts>=3){
                $this->lockedUntil= (time() + 60);
                $_SESSION['lockTime'] = $this->lockedUntil;
            } else{
                $this->attempts++;
                $_SESSION['attempts'] = $this->attempts;;
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
