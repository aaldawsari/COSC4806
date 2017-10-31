<?php

class Logout extends Controller
{
    public function index()
    {

        $db1 = db_connect();
        $stmt = $db1->prepare("INSERT INTO regLogs (date, username, stat, logType)
                                values(:currdate, :username, :stat, :type);
                ");
        $stmt->bindValue(':currdate', date('Y-m-d H:i:s'));
        $stmt->bindValue(':username', $_SESSION['username']);
        $stmt->bindValue(':stat', 1);
        $stmt->bindValue(':type', "logout");
        $stmt->execute();
        session_destroy();

        header('location:/');
    }
}
