<?php
/**
 * Created by PhpStorm.
 * User: hamad
 * Date: 2017-11-28
 * Time: 12:23 AM
 */

class Profiles
{

    public function __construct() {

    }

    public function get_profile($username) {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM personalDetails WHERE
                                username = :username ;");
        $statement->bindValue(':username', $username);

        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function update_profile($data) {

            $db = db_connect();
            $statement = $db->prepare("INSERT INTO personalDetails (username, Birthdate, phoneNumber, firstName, lastName, email) VALUES (:user, :birth, :phone, :first, :last, :email );");
            $statement->bindValue(':user', $data[0]);
            $statement->bindValue(':birth', $data[1]);
            $statement->bindValue(':phone', $data[2]);
            $statement->bindValue(':first', $data[3]);
            $statement->bindValue(':last', $data[4]);
            $statement->bindValue(':email', $data[5]);

            $statement->execute();
        $db = db_connect();
        $statement = $db->prepare("UPDATE `users` SET `cp` = '1' WHERE `users`.`username` = :user;");
        $statement->bindValue(':user', $data[0]);

        $statement->execute();
        $_SESSION['completeProfile']=1;
    }
}