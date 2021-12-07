<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController
{
    public function view() {
        //echo "chegou";
        $categorias=App::get('database')->selectAll('categorias');
        return view('admin/categorias', compact('categorias'));
    }


    public function create()
    {

    }

    public function read()
    {

    }

    public function update()
    {
        App::get('database')->edit('categorias', $_POST);
        header("Location: /categorias");
    }

    public function delete() {
        //echo $_POST['categoria'];
        App::get('database')->delete('categorias', $_POST);
        header("Location: /categorias");
    }
}