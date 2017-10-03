<?php

$users["Abdullah Aldawsari"] = "A2b2b2b2";
$users["Hamad"] = "123456";
$users["Ali"] = "12";
session_start();
	


	foreach($users as $name => $password) {
  		if($name == $_POST["username"] && $password == $_POST["password"]) {
    		
			$_SESSION['usr']=$_POST["username"];
			$_SESSION['pass']=$_POST["password"];
			header("Location: loginSuccess.php");
			die();

  		}
  	}
  		if (isset($_SESSION['logAttempts']))
			{
				$_SESSION['logAttempts']++;
		}else{
				$_SESSION['logAttempts'] = 1;
		}
	 	header("Location: loginFailed.php");
	


?>