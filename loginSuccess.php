
<html>
<header>
  <h1><a >Login success</a></h1>
 <?php 
 session_start();
if(isset($_SESSION['usr'])) {	
	?>
 <a href="?logout">Log out</a>
    <?php
    if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    }
    ?>

<?php
 echo "<p> Hello ". $_SESSION["usr"] . ", today is " . date("Y/m/d") . ".</p> 
     <p>  your password is: " .$_SESSION["pass"] . "</p>";
	
}else{
header("Location: index.php");
}
?>
</html>

