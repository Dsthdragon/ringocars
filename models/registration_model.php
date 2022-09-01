<?php

class registration_model extends model{

    function __construct(){
        parent::__construct();
    }

    function register()
    {
        $error = array();
        foreach ($_POST as $key => $value) {
            if($value == null)
            {
                $error[] = "All fields are required!";
                break;
            }
        }

        if(!validator::email($_POST['email']))
        {
            $error[] = "Input a valid email address!";
        }

        $email = $this->db->prepare("SELECT * FROM user WHERE email = :email");
        $email->execute(array(':email' => $_POST['email']));
        if($email->rowCount() > 0)
        {
            $error[] = "Email address already in the system!";
        }

        $phone = $this->db->prepare("SELECT * FROM user WHERE phone = :phone");
        $phone->execute(array(':phone' => $_POST['phone']));
        if($phone->rowCount() > 0)
        {
            $error[] = "Phone number already in the system!";
        }

        if(!validator::password($_POST['password'], 6))
        {
            $error[] = "Password must be atleast 6 characters long!";
        } else if(!validator::confirmation($_POST['password1'], $_POST['password'])){
            $error[] = "Password confirmation failed!";
        }

        if(empty($error)){
            $data = array();
            $extra = array("form", "password1");
            foreach($_POST as $key => $value){
                if(!in_array($key, $extra)){
                    if($key == 'password'){
                        $data[$key] = hash::create("sha256", $value, HASH_PASSWORD_KEY);
                    } else {
                        $data[$key] = $value;
                    }
                }
            }
            $this->db->insert("user", $data);
            return "Registration successful";
        } else {
            return $error;
        }

    }
}
