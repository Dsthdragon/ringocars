<?php

class sell_car_model extends model {

	function __construct(){
		parent::__construct();
	}

	function makeAppointment(){
		$error = array();
		foreach ($_POST as $key => $value) {
			# code...
			if($value == null){
				$error[] = "All fields are required!";
				break;
			}
		}
		$sth = $this->db->prepare("SELECT * FROM schedule WHERE appointment = :appointment");
		$sth->execute(array(':appointment' => date("Y-m-d H:i:s", strtotime($_POST['date']." ". $_POST['time']))));
		if($sth->rowCount() > 0){
			$error[] = "Selected time not available";
		} else if(time() > strtotime($_POST['date']." ". $_POST['time'])){
			$error[] = 'Selected time already pasted!';
		}
		if(empty($error)){
			$data = array();
			$data['first_name'] = $_POST['first_name'];
			$data['last_name'] = $_POST['last_name'];
			$data['email'] = $_POST['email'];
			$data['phone'] = $_POST['phone'];
			if(isset($_POST['check_cars'])){
				$data['check_cars'] = 1;
			}
			if(isset($_POST['learn_finance'])){
				$data['learn_finance'] = 1;
			}

			$data['appointment'] = date("Y-m-d H:i:s", strtotime($_POST['date']." ". $_POST['time']));

			$this->db->insert('schedule', $data);
			return "Appointment successfully added";
		} else {
			return $error;
		}
	}
}