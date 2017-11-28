<?php
class Cookie{

//    public static function set($key, $value){
//        $_SESSION[$key] = $value;
//    }

    public static function get($key){
        if(isset($_COOKIE[$key]))
            return unserialize($_COOKIE[$key]);

    }

    public static function delete($key){
        if(isset($_SESSION[$key])) unset($_SESSION[$key]);
    }

}

