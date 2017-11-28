<?php require_once '../app/views/templates/header.php' ?>
<?php
if($_SESSION['completeProfile'] ==0){
    header('Location: /Profile/index');
}
?>
<div>

    <div>
        <div>
            <p> <?=$data['message']?> </p>
        </div>
    </div>
    <a href= '/remind/index'> Reminders</a>
    <h2>Home Page</h2>

    <?php require_once '../app/views/templates/footer.php' ?>
