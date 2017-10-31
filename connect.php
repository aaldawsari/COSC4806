<?php
session_start();

$username = $_POST['Name'];
$password = $_POST['password'];
$securePass = password_hash($password, PASSWORD_DEFAULT);
if (strlen($password) < 8 || strlen($username)<=4) {
	header("Location: loginFailed.php?err=username must be 5 or more character, password must be 8 or more! " . $username);
	die();
}
$host = 'localhost';
$user = 'root';
$pass='';
$dbname='COSC';
try{

 $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}catch(PDOException $e) {
    echo $e->getMessage();
}
$ISAVAIL = $DBH->prepare("SELECT username FROM users WHERE username = '$username'");
$ISAVAIL->execute();
$res = $ISAVAIL->rowCount();
if($res>0){
	header("Location: loginFailed.php?err=username already taken!");
	die();
}
$STH = $DBH->prepare("INSERT INTO users ( username, password ) values ('{$_POST['Name']}', '$securePass')");
	$STH->execute();
	header("Location: index.php");
?>