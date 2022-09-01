<?php

class admin extends controller {

    function __construct()
    {
        parent::__construct();
        auth::admin();
    }

    function index(){
        header('location'. URL .'admin/profile');
        $this->view->currentLink = 'index';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/index");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function profile(){
        $this->view->currentLink = 'profile';

        if(isset($_POST['form'])) {
            if($_POST['form'] == "changePassword"){
                $this->view->output = $this->model->updatePassword();
            }
        }

        $this->view->profile = $this->model->getAdmin();

        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/profile");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function stores($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addShop"){
                $this->view->output = $this->model->addShop();
            } else if($_POST['form'] == "deleteFeature"){
                $this->view->output = $this->model->deleteShop();
            }
        }
        $this->view->shop = $this->model->getStores();
        $this->view->currentLink = 'stores';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/stores");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function cars($currentPag = 1, $make = null, $model = null) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addCar"){
                $this->view->output = $this->model->addCar();
            } else if($_POST['form'] == "deleteCar"){
                $this->view->output = $this->model->deleteCar();
            }
        }
        $this->view->link = null;
        if($make != null){
            $this->view->link .= $make;
            $make = explode('_',$make);
            $make = $make[0];
            $this->view->brand = $this->model->getBrand($make);
            $this->view->models = $this->model->getModels($make);
        }
        if($model != null){
            $this->view->link .= '/'.$model;
            $model = explode('_',$model);
            $model = $model[0];
            $this->view->model = $this->model->getModel($model);
        }


        $this->view->brands = $this->model->getBrands();
        $this->view->stores = $this->model->getStores();
        $this->view->types = $this->model->getTypes();
        $this->view->colors = $this->model->getColors();
        $this->view->transmissions = $this->model->getTransmissions();
        $this->view->sizes = $this->model->getSizes();
        $this->view->cylinders = $this->model->getCylinders();

        $this->view->cars = $this->model->getCars($make,$model);
        $this->view->currentLink = 'cars';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/cars");
        $this->view->render("admin/enddash");
        $this->view->render("footer");

    }

    function car($id){
        if(isset($_POST['form'])) {
            if($_POST['form'] == "updateFeature") {
                $this->view->output = $this->model->updateFeature($id);
            } else if ($_POST['form'] == "deleteCarFeature") {
                $this->view->output = $this->model->deleteCarFeature();
            } else if($_POST['form'] == "addCarImage") {
                $this->view->output = $this->model->addCarImage($id);
            } else if($_POST['form'] == "deleteImage") {
                $this->view->output = $this->model->deleteCarImage();
            } else if($_POST['form'] == 'makeMain') {
                $this->view->output = $this->model->makeMain($id);
            } else if($_POST['form'] == 'editCarSpecification') {
                $this->view->output = $this->model->editCarSpecification($id);
            }
        }
        $this->view->car = $this->model->getCar($id);
        $this->view->carFeatures = $this->model->getCarFeatures($id);
        $this->view->features = $this->model->getFeatures();
        $this->view->images = $this->model->getCarImages($id);
        $this->view->specification = $this->model->getSpecification($id);

        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/car");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function brands($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addMake"){
                $this->view->output = $this->model->addMake();
            } else if($_POST['form'] == "deleteMake"){
                $this->view->output = $this->model->deleteMake();
            }
        }
        $this->view->brands = $this->model->getbrands();
        $this->view->currentLink = 'brands';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/brands");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function features($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addFeature"){
                $this->view->output = $this->model->addFeature();
            } else if($_POST['form'] == "deleteFeature"){
                $this->view->output = $this->model->deleteFeature();
            }
        }
        $this->view->features = $this->model->getFeatures();
        $this->view->currentLink = 'properties';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/features");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function types($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addType"){
                $this->view->output = $this->model->addType();
            } else if($_POST['form'] == "deleteType"){
                $this->view->output = $this->model->deleteType();
            }
        }
        $this->view->types = $this->model->getTypes();
        $this->view->currentLink = 'properties';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/types");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function colors($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addColor"){
                $this->view->output = $this->model->addColor();
            } else if($_POST['form'] == "deleteColor"){
                $this->view->output = $this->model->deleteColor();
            }
        }
        $this->view->colors = $this->model->getColors();
        $this->view->currentLink = 'properties';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/colors");
        $this->view->render("admin/enddash");
        $this->view->render("footer");

    }

    function cylinders($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addCylinders"){
                $this->view->output = $this->model->addCylinders();
            } else if($_POST['form'] == "deleteCylinders"){
                $this->view->output = $this->model->deleteCylinders();
            }
        }
        $this->view->cylinders = $this->model->getCylinders();
        $this->view->currentLink = 'properties';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/cylinders");
        $this->view->render("admin/enddash");
        $this->view->render("footer");

    }

    function sizes($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addSize"){
                $this->view->output = $this->model->addSize();
            } else if($_POST['form'] == "deleteSize"){
                $this->view->output = $this->model->deleteSize();
            }
        }
        $this->view->sizes = $this->model->getSizes();
        $this->view->currentLink = 'properties';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/sizes");
        $this->view->render("admin/enddash");
        $this->view->render("footer");

    }



    function transmissions($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addTransmission"){
                $this->view->output = $this->model->addTransmission();
            } else if($_POST['form'] == "deleteTransmission"){
                $this->view->output = $this->model->deleteTransmission();
            }
        }
        $this->view->transmissions = $this->model->getTransmissions();
        $this->view->currentLink = 'properties';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/transmissions");
        $this->view->render("admin/enddash");
        $this->view->render("footer");

    }

    function brand($brand, $currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        if(isset($_POST['form'])) {
            if($_POST['form'] == "addModel"){
                $this->view->output = $this->model->addModel($brand);
            } else if($_POST['form'] == "deleteModel"){
                $this->view->output = $this->model->deleteModel();
            }
        }
        $this->view->brand = $this->model->getbrand($brand);
        $this->view->next = $this->model->getNextBrand($brand);
        $this->view->previous = $this->model->getPreviousBrand($brand);
        $this->view->models = $this->model->getModels($brand);
        $this->view->currentLink = 'brand';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/model");
        $this->view->render("admin/enddash");
        $this->view->render("footer");

    }

    function appointments($currentPag = 1, $type = 'future') {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }
        $this->view->type = $type;
        if($type == "future"){
            $this->view->appointments = $this->model->getAppointments();
        } else {
            $this->view->appointments = $this->model->getOldAppointments();
        }
        $this->view->currentLink = 'appointments';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/appointments");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }

    function adminstrators($currentPag = 1) {
        if ($currentPag < 1) {
            $this->view->currentPage = 1;
        } else {
            $this->view->currentPage = $currentPag;
        }

        if(isset($_POST['form']))
        {
            if($_POST['form'] == "createAdmin"){
                $this->view->output = $this->model->addAdmin();
            } else if($_POST['form'] == "deleteAdmin"){
                $this->view->output = $this->model->deleteAdmin();
            }
        }

        $this->view->admin = $this->model->getAdmins();

        $this->view->currentLink = 'adminstrators';
        $this->view->render("header");
        $this->view->render("admin/startdash");
        $this->view->render("admin/admin");
        $this->view->render("admin/enddash");
        $this->view->render("footer");
    }
    function get_models($make){
        $this->view->make = $make;
        $this->view->render('admin/get_model');
    }

    function logout() {
        session::destroy();
        header("location:" . URL ."login/admin");
        exit();
    }
}
