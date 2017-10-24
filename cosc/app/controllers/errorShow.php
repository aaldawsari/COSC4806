<?php

/**
 * Class error to display errors
 */
class errorShow extends Controller
{
    public function index() {
        if(isset($_SESSION['errCode'])){
            if($_SESSION['errCode']=='el'){
                $message = "wrong login credentials!!!";
                $this->view('home/errorShow', ['message' => $message]);
            }
        }else{
            header('Location: http://www.google.com/home');
        }
    }
    public function passErr() {
        $message = "password does not meet minimum requirment";
        $this->view('home/errorShow', ['message' => $message]);
    }
    public function usrExist() {
        $message = "username already exists!";
        $this->view('home/errorShow', ['message' => $message]);
    }
}