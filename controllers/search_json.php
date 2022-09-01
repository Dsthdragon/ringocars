<?php

class search_json extends controller {

	function __construct(){
		parent::__construct();
	}

	function index($currentPag = 1){
		if ($currentPag < 1) {
			$this->view->currentPage = 1;
		} else {
			$this->view->currentPage = $currentPag;
		}
		$this->view->cars = $this->model->getCars();
		$this->view->render('cars/list_cars');
	}

	function updateModels(){
		$this->view->models = $this->model->getModels();
		$this->view->render('cars/list_models');
	}

	function updateFeature(){
		$this->view->features = $this->model->getFeaturesWithMake();
		$this->view->render('cars/list_features');
	}
}