<?php

class Home extends Controller {

    public function index($name = '') {		
        $user = $this->model('User');
		
		$message = 'today is ' . date("F jS, Y") .'. hello ' . $_SESSION['usr'] . ',  your pass is ' . $_SESSION['pass'];
        $this->view('home/index', ['message' => $message]);
    }

    public function login($name = '') {
        $this->view('home/login');
    }

}
