<?php

/**
 *
 */
class dashboard_model extends model
{

    function __construct()
    {
        parent::__construct();
    }

    function profile(){
    	$sth = $this->db->prepare("SELECT * FROM user WHERE id = :id");
    	$sth->execute(array(':id' => $_SESSION['id']));
    	return $sth->fetch();
    }

    function getAppointments()
    {
    	$data = $this->profile();
    	return $this->db->select("SELECT * FROM schedule WHERE email = :email", array(':email' => $data['email']));
    }

    function getSaves()
    {
    	$data = $this->profile();
    	return $this->db->select("SELECT * FROM saved s LEFT JOIN ad a ON s.ad = a.id WHERE user = :user", array(':user' => $data['id']));
    }

    function deleteAppointment()
    {
    	$data = $this->profile();
    	$sth = $this->db->prepare("SELECT * FROM schedule WHERE email = :email AND id = :id");
    	$sth->execute(array(':email' => $data['email'], ':id' => $_POST['id']));
    	if($sth->rowCount() > 0) {
    		$this->db->deletet('schedule', "id = {$_POST['id']}");
    		return "Selected Appointment deleted!";
    	} else {
    		return array("Appointment was not found!");
    	}
    }

    function updatePassword(){

        $error = array();
        foreach($_POST as $key => $value){
            if($value == null){
                $error[] = "All fields are required!";
                break;
            }
        }
        $user = $this->profile();
        if($user['password'] != hash::create("sha256", $_POST['password'], HASH_PASSWORD_KEY)) {
            $error[] = "Invalid password inputted";
        }
        if(strlen($_POST['password1']) < 6)
        {
            $error[] = "Password must be atleast 6 characters long";
        }
        if($_POST['password'] == $_POST['password1'])
        {
            $error[] = "new and old password are the same!";
        }
        if($_POST['password1'] != $_POST['password2'])
        {
            $error[] = "Password confirmation not a match!";
        }
        if(empty($error))
        {
            $data = array();
            $data['password'] = hash::create("sha256", $_POST['password1'], HASH_PASSWORD_KEY);
            $this->db->update("user", $data, "id = {$_SESSION['id']}");
            return "password updated";
        } else {
            return $error;
        }

    }

}
