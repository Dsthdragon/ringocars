<?php

class link {

    public static function get($url){

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_VERBOSE, TRUE);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

}
