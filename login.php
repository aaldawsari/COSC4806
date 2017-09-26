<?php

$users["Abdullah Aldawsari"] = "A2b2b2b2";
$users["Hamad"] = "123456";
$users["Ali"] = "B2b2b2b2";

	
foreach($users as $name => $password) {
  if($name == $_POST["username"] && $password == $_POST["password"]) {
   
	header("Location: loginSuccess.php");
	die();
  }		
}	

header("Location: loginFailed.php")
?>