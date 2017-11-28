<?php
/**
 * Created by PhpStorm.
 * User: hamad
 * Date: 2017-11-28
 * Time: 12:05 AM
 */

class Profile extends Controller
{

    public function index() {

        $profile = $this->model('Profiles');
        $data = $profile->get_profile($_SESSION['usr']);
        $usr = $data[0]['firstName'] . " " . $data[0]['lastName'];
        $birth= $data[0]['Birthdate'];
        $email = $data[0]['email'];
        $phone = $data[0]['phoneNumber'];

        $this->view("home/profilePage", ['usr'=> $usr, 'birth' => $birth, 'email'=> $email, 'phone'=>$phone]);


    }


    public function update(){
        $profile = $this->model('Profiles');
        $data[0] = $_SESSION['usr'];
        $data[1] = $_POST['birth'];
        $data[2] = $_POST['pn'];
        $data[3] = $_POST['fn'];
        $data[4] = $_POST['ln'];
        $data[5] = $_POST['useremail'];
        $profile->update_profile($data);
        $this->view("home/index");
    }
}