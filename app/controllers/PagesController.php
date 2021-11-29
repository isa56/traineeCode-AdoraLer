<?php

namespace App\Controllers;

use App\Core\App;
use mysqli;

//core/helpers.php para qualquer alteração em relação a view

class PagesController
{

    public function index() {
        return view('site/index');
    }

    public function contato() {
        //var_dump("Bateu no Controller");
        return view('site/contato');
    }

    public function login() {
        return view('site/login');
    }

    public function guiaMochileiro() {
        return view('site/paginaGuiaMochileiro');
    }

    public function produtos() {
        return view('site/paginaProdutos');
    }

    public function quem_somos() {
        return view('site/quem_somos');
    }

    public function adicionar_usuario() {
        return view('admin/adicionar_usuario');
    }

    public function adm() {
        return view('admin/adm');
    }

}