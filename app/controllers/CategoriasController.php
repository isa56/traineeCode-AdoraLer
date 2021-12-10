<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController
{
    public function view() {
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
        
    }

    public function delete()
    {

    }
}