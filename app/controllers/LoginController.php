<?php

namespace App\Controllers; // atribuindo caminho para este arquivo aqui
use App\Core\App; // utilizando função da App
class LoginController {
    public static $recado; 

    public function login() {
        static::$recado=App::get('database')->valid_login($_POST);
        if(static::$recado=="correto") {
            return view ('admin/adm');
        }else {
            return view ('site/login');
        }
    }

    public static function getMessage() {
        return static::$recado;
    }
}

?>