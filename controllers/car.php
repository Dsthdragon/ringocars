<?php

class car extends controller{

    function __construct(){
        parent::__construct();
    }

    function index($car){
        $car = explode('-', $car);
        $id = $car[0];
        $this->view->title = str_replace("_", " ", $car[1]);

        $this->view->car = $this->model->getCar($id);
        $this->view->carFeatures = $this->model->getCarFeatures($id);
        $this->view->images = $this->model->getGallery($id);
        $this->view->specification = $this->model->getCarSpecification($id);

        $this->view->render('header');
        $this->view->render('car/index');
        $this->view->render('footer');
    }
}
