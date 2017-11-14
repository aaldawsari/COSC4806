<?php

class Login extends Controller {
    public function index() {

        $dbh = db_connect();
        $statment = $dbh ->prepare(" SELECT COUNT(*) FROM regLogs WHERE date > :date ORDER BY `date` DESC;
                                ");
        $date = time() -(60*60*24);
        $statment->bindValue(':date', $date);
        try { $statment->execute();}
        catch(PDOException $e){echo $e->getMessage();}

        $logins = $statment->fetchColumn();
        $_SESSION['todayLogins'] = $logins;

        sleep(2);

        $user = $this->model('User');

        if (isset($_POST['username'])) {
            $user->username = $_POST['username'];
        }

        if (isset($_POST['password'])) {
            $user->password = $_POST['password'];
        }

        $user->authenticate();

        if ($user->auth == TRUE) {
            $_SESSION['auth'] = true;

        }else{
            $_SESSION['errCode'] = 'el';
            $this->view('/home/errorShow');
        }
        
        header('Location: /home');
    }
	
	public function register () {
		$user = $this->model('User');
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$user->register($username, $password);
			//$_SESSION['auth'] = true;
		}

		$this->view('home/register');
	}
}
