
<html>
<?php
session_start();
if(isset($_SESSION['usr'])) {	
header("Location: loginSuccess.php");
}else{


?>
<form action="login.php" method="post" >
<h1>Login</h1>
<p><label> Username: </label><input type="text" name="username" /></p>
<p><label> Password: </label><input type="password" name="password"/></p>
<p class="center"><input value="Login" type="submit" class="center"/></p>
</form>
<form method="POST" action=''>
<input type="submit" name="rep1"  value="Report">
<a href = "account.php"> Create an account!</a>
</form>
<?php 

if (isset($_POST['rep1'])) 
{ 
	if(isset($_SESSION['logAttempts'])){
		echo '<a>you made '.$_SESSION['logAttempts'] .' attempts</a>'; 
	}else
   		echo '<a>there is no attempts made</a>'; 
}  
}
?>


</html>