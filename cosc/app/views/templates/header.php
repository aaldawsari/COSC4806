<?php
if (isset($_SESSION['auth']) != 1) {
    header('Location: /home');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>COSC 4806</title>
    </head>
    <body>
        <div>
            <div>
                <div>
                    <a href="/home">COSC</a>
                </div>
                <div>

                    <a href="/logout">Logout</a>

                </div>
            </div>
        </div>