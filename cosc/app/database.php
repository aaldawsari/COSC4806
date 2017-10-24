<?php

/* database connection stuff here
 * 
 */

function db_connect() {
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=COSC", "root", "");
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    return $dbh;
}
