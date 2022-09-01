<?php


class login_model extends model {

    function __construct() {
        parent::__construct();
    }

    function login(){
        $sth = $this->db->prepare("SELECT * FROM user WHERE (email = :user OR username = :user) AND (password = :pass)");
        $sth->execute(array(':user' => $_POST['username'], ':pass' => hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)));
        if($sth->rowCount() > 0)
        {
            $data = $sth->fetch();
            $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$data['lat'].",".$data['lon'];
            $postBody = link::get($url);
            $postBody = json_decode($postBody);
            session::init();
            session::set('loggedIn', true);
            session::set('id', $data['id']);
            session::set('username', $data['username']);
            session::set('lon', $data['lon']);
            session::set('lat', $data['lat']);
            session::set('address', $postBody->results[1]->formatted_address);
            header('location:'. URL . 'dashboard');
        }
        return array("User not found!");
    }

    function admin(){
        $sth = $this->db->prepare("SELECT * FROM admin WHERE (email = :user) AND (password = :pass)");
        $sth->execute(array(':user' => $_POST['email'], ':pass' => hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)));
        if($sth->rowCount() > 0)
        {
            $data = $sth->fetch();
            session::init();
            session::set('loggedIn', true);
            session::set('id', $data['id']);
            session::set('fullname', $data['fullname']);
            session::set('role', $data['role']);
            session::set('admin', true);

            header('location:'. URL . 'admin');
        }
        return array("User not found!");

    }

}
