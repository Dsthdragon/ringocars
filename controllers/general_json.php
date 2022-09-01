<?php

class general_json extends controller {

	function __construct(){
		parent::__construct();
	}

	function navbar($type = null){
		$this->view->type = $type;
		$this->view->render('general/navbar');
	}

	function save($id){
		$this->view->save = $this->model->savedSearch($id);
		$this->view->render('general/saveSearch');
	}

	function compare($id){
		$this->view->save = $this->model->addToCompare($id);
		$this->view->render('general/addToCompare');
	}

	function compareData(){
		$this->view->ads = $this->model->compareList();
		$this->view->render('general/compareList');
	}

	function removeCompare($id){
		session::init();
		if(($key = array_search($id, $_SESSION['compare'])) !== false){
			unset($_SESSION['compare'][$key]);
		}
		$this->compareData();
	}

	function checkCompare(){
		session::init();
		if(empty($_SESSION['compare'])){
			echo false;
			return;
		}
		else{
			echo true;
			return;
		}
	}
}