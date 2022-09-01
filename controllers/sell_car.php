<?php

class sell_car extends controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->view->activePage = "sells";
		if(isset($_POST['form'])){
			if($_POST['form'] == 'makeAppointment'){
				$this->view->output = $this->model->makeAppointment();
			}
		}

		$this->view->render('header');
		$this->view->render('sell_car/index');
		$this->view->render('footer');
	}
}