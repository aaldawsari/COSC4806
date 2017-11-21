<?php

class Report extends Controller {

    public function index($id = '') {
        $r = $this->model('Reports');
        $list = $r->get_mostUser();



        $this->view('reports/mostRem', [
            'list' => $list
        ] );
    }
    public function range(){
        if(isset($_POST['from'])){
            $r = $this->model('Reports');
            $format = 'Y-m-d H:i:s';
            $dateFrom = DateTime::createFromFormat($format, $_POST['from'] . ' 00:00:00');
            $dateTo = DateTime::createFromFormat($format, $_POST['to'] . ' 00:00:00');
            $list = $r->get_reminders($dateFrom, $dateTo);
            $this->view('reports/mostRem', [
                'list' => $list
            ] );
        }
    }
}