<?php

namespace App\Controllers; // atribuindo caminho para este arquivo aqui
use App\Core\App; // utilizando função da App
class LoginController {
    public static $recado; 
    public static $login;
    public function login() {
        static::$recado=App::get('database')->valid_login($_POST);
        if(static::$recado=="correto") {
            static::$login = true;
            return view ('admin/adm');
        }else {
            static::$login = false;
            return view ('site/login');
        }
    }

    public static function getMessage() {
        return static::$recado;
    }

    public static function getLogin() {
        if(static::$login == true) {
            return true;
        }
        return false;
    }

}

?>