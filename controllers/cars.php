<?php

class cars extends controller {

    function __construct() {
        parent::__construct();
        auth::hangin();
    }

    function index($make = null, $model = null, $currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        $this->view->link = $make . "/" . $model;
        if($make != "empty"){
            $make = urlencoder::decode('_', $make);
        } else {
            $make = null;
        }
        if($model != "empty"){
            $model = urlencoder::decode('_', $model);
        } else {
            $model = null;
        }
        
        $this->view->activePage = "cars";
        if(isset($_POST['form']) && $_POST['form'] == "usedOnly") {
            $this->view->activePage = "used";
        }
        $this->view->title = $make;
        $this->view->make = $this->model->getMake($make);
        $this->view->makes = $this->model->getMakes();
        $this->view->models = $this->model->getModels($make);
        $this->view->features = $this->model->getFeaturesWithMake($make, $model);
        $this->view->types = $this->model->getTypes();
        $this->view->colors = $this->model->getColors();
        $this->view->cylinders = $this->model->getCylinders();
        $this->view->sizes = $this->model->getSize();
        $this->view->transmissions = $this->model->getTransmissions();

        if($model != null){
            $this->view->title .= " ( ".$model." ) ";
            $this->view->model = $this->model->getModel($make, $model);
        }

        $this->view->cars = $this->model->getCars($make, $model);

        $this->view->render('header');
        $this->view->render('cars/index');
        $this->view->render('footer');
    }

}
