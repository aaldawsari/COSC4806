<?php

class Reminders {
    
    public function __construct() {
        
    }
	
	public function get_reminders () {
		$db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes
                                WHERE username = :username AND deleted = 0;");
        $statement->bindValue(':username', $_SESSION['usr']);
		
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
	
	public function get_reminder ($id) {
		$db = db_connect();
        $statement = $db->prepare("SELECT * FROM notes WHERE
                                Id = :id;");
        $statement->bindValue(':id', $id);
		
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
    public function add ($sub, $des)
    {
        if ($_SESSION['completeProfile'] == 1) {


            $db = db_connect();
            $statement = $db->prepare("INSERT INTO notes(Subject, description, username) VALUES (:subject, :description, :username);");

            $statement->bindValue(':subject', $sub);
            $statement->bindValue(':description', $des);
            $statement->bindValue(':username', $_SESSION['usr']);
            $statement->execute();
        }
    }
    public function update ($sub, $des, $id)
    {
        $db = db_connect();
        $insert=$db->prepare("UPDATE notes SET Subject= :subject , description= :description WHERE Id= :id; ");
        $insert->bindValue(':subject',$sub);
        $insert->bindValue(':id',$id);
        $insert->bindValue(':description',$des);
        $insert->execute();
    }
	
	public function removeItem($id) {
		$db = db_connect();

        $statement = $db->prepare("UPDATE notes SET deleted = 1 WHERE Id = :id;");
        $statement->bindValue(':id', $id);
        $statement->execute();

	}
}
