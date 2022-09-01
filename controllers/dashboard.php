<?php

/**
 *
 */
class dashboard extends controller
{

    function __construct()
    {
        # code...
        parent::__construct();
        auth::handleLogin();
    }

    function index()
    {

        if(isset($_POST['form'])) {
            if($_POST['form'] == "changePassword"){
                $this->view->output = $this->model->updatePassword();
            }
        }

        $this->view->profile = $this->model->profile();
        $this->view->dashPage = "index";
        $this->view->dashPageLink = "dashboard/index";
        $this->view->render('header');
        $this->view->render('dashboard/dashbar');
        $this->view->render('footer');
    }

    function saved()
    {
        $this->view->saves = $this->model->getSaves();
        $this->view->dashPage = "saved";
        $this->view->dashPageLink = 'dashboard/saved';
        $this->view->render('header');
        $this->view->render('dashboard/dashbar');
        $this->view->render('footer');   
    }

    function appointments()
    {
        if(isset($_POST['form'])){
            if($_POST['form'] == 'deleteAppointment'){
                $this->view->output = $this->model->deleteAppointment();
            }
        }
        $this->view->appointments = $this->model->getAppointments();
        $this->view->dashPage = "appointments";
        $this->view->dashPageLink = 'dashboard/appointments';
        $this->view->render('header');
        $this->view->render('dashboard/dashbar');
        $this->view->render('footer');   
    }

    function logout() {
        session::destroy();
        header("location:" . URL ."login");
        exit();
    }
}
