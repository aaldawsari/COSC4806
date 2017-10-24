<?php
require_once('../app/core/utils.php');

if (isset($_SESSION['auth']) == 1) {
    header('Location: /home');
}
?>

<!DOCTYPE html>
    <link href= "/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <title>COSC 4806</title>
</head>
<body>