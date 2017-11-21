<?php

class Reports {

    public function __construct() {

    }

    public function get_mostUser () {
        $db = db_connect();
        $statement = $db->prepare("SELECT username FROM notes 
        GROUP BY username
        ORDER BY COUNT(*) DESC
        ;");
        $statement->bindValue(':val', 0);

        $statement->execute();
        $rows = $statement->fetch();
        return $rows;
    }
    public function get_reminders ($from, $to) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes
                                WHERE 'create date' BETWEEN :from AND :to;");
        $statement->bindValue(':from', $from);
        $statement->bindValue(':to', $to);

        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function get_range ($from, $to) {
        $db = db_connect();
        $statement = $db->prepare("select * from notes 
        where 'create date' between :from and :to 
        order by 'create date' desc;");
        $statement->bindValue(':from', $from);
        $statement->bindValue(':to', $to);

        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

}
