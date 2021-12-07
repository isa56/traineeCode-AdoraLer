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
        session_start();
        $_SESSION['recado'] = "a";
        return view('admin/adicionar_usuario');
    }

    public function adm() {
        return view('admin/adm');
    }

    public function categorias() {
        return view('admin/categorias');
    }

    public function admProd() {
        return view('admin/administrativaProdutos');
    }

    public function addProd() {
        return view('admin/adicionar_produto');
    }

    public function delete() {
        return view('admin/delete_usuario');
    }

    public function userOption() {
        return view('admin/userOption');
    }

    public function edit() {
        return view('admin/editar_usuario');
    }

    public function listagem_produtos() {
        //session_start();
        //$_SESSION['mensagem'] = "a";
        return view('admin/listagem_produtos');
    }

}