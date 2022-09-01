<?php

class imagedisplay {

    public static function display($link, $type) {
        if (!empty($link) && file_exists(ROOT . '/' . $link)) {
            return URL . $link;
        }else if($type == "car"){
            return URL. 'public/img/car.png';
        } else{
            return URL. 'public/img/avatar.svg';
        }
    }


}
