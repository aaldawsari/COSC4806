<?php require_once '../app/views/templates/header.php'?>

<h2>Update Reminder</h2>


<form action="<?'../remind/update/='.$data['item'][0]['Id']?>" method="post">

Subject:
<input type="text" name="sub" value="<?=$data['item'][0]['Subject']?>">
Description:
<input type="text" name="des" value="<?=$data['item'][0]['description']?>">

<button type="submit"> Update </button>

</form>