<?php


class login extends controller{

    function __construct(){
        parent::__construct();
    }

    function index()
    {        
        if(isset($_POST['form'])) {
            if($_POST['form'] == "loginForm"){
                $this->view->output = $this->model->login();
            }
        }
        $this->view->render('header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }

    function admin()
    {        
        if(isset($_POST['form'])) {
            if($_POST['form'] == "loginForm"){
                $this->view->output = $this->model->admin();
            }
        }
        $this->view->render('header');
        $this->view->render('login/admin');
        $this->view->render('footer');
    }
}
