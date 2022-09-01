<?php

/**
* 
*/
class registration_model extends model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function register()
	{
		$error = array();
		foreach($_POST as $key => $value){
			if($value == null)
			{
				$error[] = "All fields are required!";
				break;
			}
		}
	}
}