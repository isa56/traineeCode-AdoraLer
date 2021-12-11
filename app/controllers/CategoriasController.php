<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class CategoriasController
{

    public static $id;
    public static $message;

    public static function getId() {
        return static::$id;
    }

    public static function getMessage() {
        return static::$message;
    }
    
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

        static::$id = $_POST['id'];
        if($_POST['nome'] == $_POST['nome_confirma']) { // se os nomes forem iguais ele entra
            $correto = App::get('database')->validUser('categorias', $_POST); // passa pelo validUser onde vai ser verificado se é da categoria que veio, verifica se já existe um nome igual na table_categorias, se não existir retorna correto
            if($correto == "correto") {
                App::get('database')->edit('categorias', $_POST); // edita a categoria;
                $this->view(); // chama a função view para retornar todos as categorias para pag de categorias;
            } else {
                static::$message = $correto; // caso não esteja correta passa a mensagem para essa variavel statica que será chamada pela editar_categorias caso a function getMessage() não tenha retorno vazio(retorna essa variavel ai mesmo)
                return view('admin/editar_categoria');
            }
        } else {
            static::$message = "Os nomes não conferem";
            return view('admin/editar_categoria');
        }
    }

    public function delete() {
        //echo $_POST['categoria'];
        App::get('database')->deleteCategorias('categorias', $_POST);
        header("Location: /categorias");
        
    }
}