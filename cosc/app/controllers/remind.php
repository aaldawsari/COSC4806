<?php

class Remind extends Controller {
	
    public function index($id = '') {		
        $r = $this->model('Reminders');
		$list = $r->get_reminders();
		
		if ($id) {
			$item = $r->get_reminder($id);
			
			print_r ($item);
			
			//$this->view('remind/view', ['item' => $item] );
			die;
		}
		
		$this->view('reminder/index', [
		'list' => $list
		] );
    }
	
	public function update($id) {
		$r = $this->model('Reminders');
        $item = $r->get_reminder($id);
        if(isset($_POST['sub']) && !empty($_POST['sub'])){
            $r->update($_POST['sub'],$_POST['des'], $id);
        }
		
		$this->view('reminder/update', ['item' => $item] );
			
    }
	
	public function remove($id = '') {
		$r = $this->model('Reminders');
		$r->removeItem($id);
		header('Location:/remind');
    }
	
	public function create() {
        $r = $this->model('Reminders');
        $submit=$_POST['add'];
        if(isset($_POST['sub']) && !empty($_POST['sub'])){
            $sub=$_POST['sub'];
            $des=$_POST['des'];
            $r->add($sub,$des);
        }

        $this->view('reminder/add');
    }
}