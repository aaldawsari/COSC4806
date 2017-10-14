<?php
session_start();
	
$host = 'localhost';
$user = 'root';
$pass='';
$dbname='COSC';






try{
 $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}catch(PDOException $e) {
    echo $e->getMessage();
}

$stmt = $DBH->prepare(" SELECT * FROM users WHERE username = '{$_POST['username']}' ");
$result = $stmt->execute();
$usrs = $stmt->fetch();
echo $usrs[1];

if (isset($usrs[0])) {
    if (password_verify($_POST['password'], $usrs[1])) {
    	$_SESSION['usr']=$_POST["username"];
			$_SESSION['pass']=$_POST["password"];
        header("Location: loginSuccess.php");
        die();
    } else {
        header("Location: loginFailed.php?err=password is invalid!");
    die();
    }
} else {
    header("Location: loginFailed.php?err=username is invalid!!");
    die();
}

?>