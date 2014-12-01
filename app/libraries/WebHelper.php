<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author nitesh
 */
class WebHelper {

    public static function helloWorld() {
        echo 'Hello World';
        dd('Hello World');
    }

    public static function saltGenerator($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public static function dump($a, $isJson = false) {
        if ($isJson) {
            //print result afer encoding in json
            print json_encode(print_r($a, true));
        } else {
            //print data pretty code format
            echo '<pre>';
            print_r($a);
            echo '</pre>';
        }
        //stop further processing
        exit;
    }

}
