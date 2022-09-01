<?php

/**
 *
 */
class auth {

    public static function handleLogin() {
        @session_start();
        $logged = session::get('loggedIn');
        $role = session::get('role');
        $admin = session::get('admin');
        if ($logged == false) {
            session::destroy();
            header('location:' . URL .'login');
            exit();
        }
        if($admin == true){
            header('location:' . URL .'admin');
        }
    }

    public static function hangin() {
        @session_start();
        $logged = session::get('loggedIn');
        $name = session::get('uid');
    }

    public static function alreadyIn() {
        @session_start();
        $logged = session::get('loggedIn');
        $name = session::get('uid');
        $admin = session::get('admin');
        if($logged == true){
            if($admin == false){
                header('location:' . URL .'dashboard');
            } else {
                header('location:' . URL .'admin');
            }
        }
    }

    public static function admin(){
        @session_start();
        $logged = session::get('loggedIn');
        $role = session::get('role');
        $admin = session::get('admin');
        if ($logged == false) {
            session::destroy();
            header('location:' . URL .'login/admin');
            exit();
        }
        if($admin == false){
            header('location:' . URL .'dashboard');
        }

    }

}
