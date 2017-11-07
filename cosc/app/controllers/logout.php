<?php

class Logout extends Controller
{
    public function index()
    {

        $db = db_connect();
        $statement = $db->prepare("INSERT INTO regLogs (date, username, stat, logType)
                                values(:currdate, :username, :stat, :type);
                ");
        $statement->bindValue(':currdate', time());
        $statement->bindValue(':username', $_SESSION['usr']);
        $statement->bindValue(':stat', 1);
        $statement->bindValue(':type', "logout");
        $statement->execute();
        // safe sleep
        sleep(3);
            session_destroy();
            header('location:/');




    }
}
