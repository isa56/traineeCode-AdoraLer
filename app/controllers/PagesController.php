<?php

namespace App\Controllers;

use App\Core\App;
use mysqli;

//core/helpers.php para qualquer alteração em relação a view

class PagesController
{

    public function index() {
        return view('index');
    }

    public function contato() {
        //var_dump("Bateu no Controller");
        return view('contato');
    }

    public function login() {
        return view('login');
    }

    public function guiaMochileiro() {
        return view('paginaGuiaMochileiro');
    }

    public function produtos() {
        return view('paginaProdutos');
    }

    public function quem_somos() {
        return view('quem_somos');
    }

    public function adicionar_usuario() {
        return view('admin/adicionar_usuario');
    }

}