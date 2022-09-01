<?php

/**
*
*/
class registration extends controller
{

	function __construct()
	{
		# code...
		parent::__construct();
	}

	function index()
	{
		if(isset($_POST['form']))
		{
			if($_POST['form'] == "registerForm")
			{
				$this->view->output = $this->model->register();
			}
		}
		$this->view->render("header");
		$this->view->render("registration/index");
		$this->view->render("footer");
	}
}
