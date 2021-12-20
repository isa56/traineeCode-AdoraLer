<?php

namespace App\Controllers;

use App\Core\App;
use mysqli;

//core/helpers.php para qualquer alteração em relação a view

class PagesController
{
    public static $categ;

    public function index()
    {
        session_start(); // starta a sessão para acessar a QueryBuilder e buscar o número total de linhas na tabela na variavel $_SESSION['tabela'];
        $_SESSION['total'] = "a";
        if (isset($_SESSION['categ'])) {
            unset($_SESSION['categ']);
        }
        $produtos = App::get('database')->selectAllProdutos('produtos'); // requisita tudo da tabela usuarios;
        $_SESSION['categ'] = "a";
        $_SESSION['array'] = $produtos;
        $categorias = App::get('database')->selectAllCategorias('tb_categorias'); // requisita tudo da tabela usuarios;
        $total = $_SESSION['total']; // passa o valor do total de linhas da tabela tb_usuarios para uma variavel, para que eu possa fechar essa sessão e abrir uma com a userOption
        //session_destroy(); // fechando a sessão
        //session_start(); // abrindo uma nova sessão
        $_SESSION['total'] = $total; // atribuindo o total de linhas da tabela para a nova variavel global $_SESSION['total'];
        //}
        if (isset($_GET['end'])) {
            $_SESSION['end'] = $_GET['end'];
            /* se não for a primeira vez acessando a userOption a gente vai receber de onde começar a exibir os usuarios por um método get na variavel $_GET['end']; 
            e retornar ele por uma variavel global $_SESSION['end']; pois precisamos acessar esse fim para imprimir todos os usuarios na tabela*/
        } else {
            $_SESSION['end'] = 9; // padrão é começar do 9 pois estou imprimindo 10 usuarios por vez;
        }
        return view('site/index', compact('produtos', 'categorias'));
    }

    public function contato()
    {
        return view('site/contato');
    }

    public function login()
    {
        return view('site/login');
    }

    public function guiaMochileiro()
    {
        return view('site/paginaGuiaMochileiro');
    }

    public function produtos()
    {
        session_start(); // starta a sessão para acessar a QueryBuilder e buscar o número total de linhas na tabela na variavel $_SESSION['tabela'];
        $_SESSION['total'] = "a";
        if (isset($_SESSION['categ'])) {
            unset($_SESSION['categ']);
        }
        $produtos = App::get('database')->selectAllProdutos('produtos'); // requisita tudo da tabela usuarios;
        $_SESSION['categ'] = "a";
        $_SESSION['array'] = $produtos;
        $categorias = App::get('database')->selectAllCategorias('tb_categorias'); // requisita tudo da tabela usuarios;
        $total = $_SESSION['total']; // passa o valor do total de linhas da tabela tb_usuarios para uma variavel, para que eu possa fechar essa sessão e abrir uma com a userOption
        //session_destroy(); // fechando a sessão
        //session_start(); // abrindo uma nova sessão
        $_SESSION['total'] = $total; // atribuindo o total de linhas da tabela para a nova variavel global $_SESSION['total'];
        //}
        if (isset($_GET['end'])) {
            $_SESSION['end'] = $_GET['end'];
            /* se não for a primeira vez acessando a userOption a gente vai receber de onde começar a exibir os usuarios por um método get na variavel $_GET['end']; 
            e retornar ele por uma variavel global $_SESSION['end']; pois precisamos acessar esse fim para imprimir todos os usuarios na tabela*/
        } else {
            $_SESSION['end'] = 9; // padrão é começar do 9 pois estou imprimindo 10 usuarios por vez;
        }
        return view('site/paginaProdutos', compact('produtos', 'categorias')); // retorno a view padrão e o compact com o vetor de usuarios retornado do Query Builder;
    }

    public function quem_somos()
    {
        return view('site/quem_somos');
    }

    public function adicionar_usuario()
    {
        session_start();
        $_SESSION['recado'] = "a";
        return view('admin/adicionar_usuario');
    }

    public function adm()
    {
        return view('admin/adm');
    }

    public function categorias()
    {
        return view('admin/categorias');
    }

    public function admProd()
    {
        return view('admin/administrativaProdutos');
    }

    public function addProd()
    {
        return view('admin/adicionar_produto');
    }

    public function delete()
    {
        return view('admin/delete_usuario');
    }

    public function userOption()
    {
        return view('admin/userOption');
    }

    public function edit()
    {
        return view('admin/editar_usuario');
    }

    public function listagem_produtos()
    {
        //session_start();
        //$_SESSION['mensagem'] = "a";
        return view('admin/listagem_produtos');
    }

    public function editarc()
    {
        return view('admin/editar_categoria');
    }

    public function busca_produto()
    {
        return view('admin/busca_produtos');
    }

    public function editar_produto()
    {
        return view('admin/editar_produto');
    }

    public function pesquisa() {
        return view('site/pesquisa');
    }

}
