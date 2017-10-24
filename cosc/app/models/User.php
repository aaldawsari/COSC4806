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
		 
		$db = db_connect();
        $statement = $db->prepare("select * from users
                                WHERE username = :name;
                ");
        $statement->bindValue(':name', $this->username);
        $statement->execute();
        $usrs = $statement->fetch();

        if (isset($usrs[0])) {
            if (password_verify($this->password, $usrs[1])) {
                $_SESSION['usr']=$this->username;
                $_SESSION['pass']=$this->password;
                $this->auth=true;
            }
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
