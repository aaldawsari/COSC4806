<?php require_once '../app/views/templates/header.php'?>

<h2>create Reminder</h2>


<form action="<?'../remind/update/create'?>" method="post">

Subject:
<input type="text" name="sub">
Description:
<input type="text" name="des"">

<button type="submit"> add </button>

</form>