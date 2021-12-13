<?php

namespace App\Controllers; // atribuindo caminho para este arquivo aqui
use App\Core\App; // utilizando função da App

class ProdutosController {

    public static $total;
    public static $categoria;
    public static $preco;
    public static $message;
    public static $id;
    public static $categ;

    public static function admProdView() {

        //if(!isset($_POST['start'])) {
            session_start(); // starta a sessão para acessar a QueryBuilder e buscar o número total de linhas na tabela na variavel $_SESSION['tabela'];
            $_SESSION['total'] = "a";
            if(isset($_SESSION['categ'])) {
                unset($_SESSION['categ']);
            }
            $produtos = App::get('database')->selectAll('produtos'); // requisita tudo da tabela usuarios;
            $_SESSION['categ'] = "a";
            $_SESSION['array'] = $produtos;
            static::$categ = App::get('database')->selectAll('categorias'); // requisita tudo da tabela usuarios;
            $total = $_SESSION['total']; // passa o valor do total de linhas da tabela tb_usuarios para uma variavel, para que eu possa fechar essa sessão e abrir uma com a userOption
            session_destroy(); // fechando a sessão
            session_start(); // abrindo uma nova sessão
            $_SESSION['total'] = $total; // atribuindo o total de linhas da tabela para a nova variavel global $_SESSION['total'];
            echo $_SESSION['total'];
            //var_dump();
        //}
        if(isset($_GET['end'])) { 
            $_SESSION['end'] = $_GET['end'];
            /* se não for a primeira vez acessando a userOption a gente vai receber de onde começar a exibir os usuarios por um método get na variavel $_GET['end']; 
            e retornar ele por uma variavel global $_SESSION['end']; pois precisamos acessar esse fim para imprimir todos os usuarios na tabela*/
        } else {
            $_SESSION['end'] = 9; // padrão é começar do 9 pois estou imprimindo 10 usuarios por vez;
        }
        return view('admin/administrativaProdutos', compact('produtos')); // retorno a view padrão e o compact com o vetor de usuarios retornado do Query Builder;

        //antiga parte para backup
        /*$usuarios = App::get('database')->selectAll('usuarios');
        return view('admin/userOption', compact('usuarios'));*/
    }

    public static function getMessage() {
        return static::$message;
    }

    public static function getCategoria() {
        return static::$categoria;
        //essa função serve para auxiliar a saber qual categoria foi digitada inicialmente e retornar para a exibição na tabela
    }

    public static function getPreco() {
        return static::$preco;
        //essa função serve para auxiliar a saber qual categoria foi digitada inicialmente e retornar para a exibição na tabela
    }
    
    public static function getCateg() {
        return static::$categ;
        //essa função serve para auxiliar a saber qual categoria foi digitada inicialmente e retornar para a exibição na tabela
    }

    public static function getId() {
        return static::$id;
        /*É mais simples do que parece. Na primeira vez que o adm quiser editar algum usuario ele vai clicar no botão da userOption 
        e logo ali já vai enviar o id por um método GET para o editar_usuario lá esse id vai ser salvo em um input type hidden que vai ser enviado junto ao que o 
        adm editar para o UsersController por um método POST, aqui ele vai passar pelas validações e enviado para o QueryBuilder para realizar as devidas alterações, lá ele vai alterar
        tudo que foi solicitado e retornar para a UsersController, porém nessa brincadeira toda, caso ocorra algum erro, a pagina seria retornada para o usuario corrigir eles, só que como
        a editar_usuario recebe o id do usuario que ela quer editar por um método GET, a variavel global $_GET dela não teria mais nenhum valor, fazendo com que quando enviado o ajuste
        a UsersController não soubesse quem estaria sendo editado, pois o id de quem ele estaria tentando alterar não estaria mais disponivel, para evitar isso essa função getId salva o id da $_POST['id']
        aqui na chamada da função caso ocorra algum erro e fica disponivel para a editar_usuario utilizar em caso de erro*/
    }

    public static function getTotal() {
        return static::$total;
    }

    public function create() {

            session_start();
            $_SESSION['categoria_id'] = 'a';
            $resultado = App::get('database')->validUser('produtos',$_POST);
            if($resultado == "correto") {
                App::get('database')->insert('produtos', [
                        'nome'=>$_POST['Nome'],
                        'categoria_id'=>$_SESSION['categoria_id'],
                        'preco'=>$_POST['Preco'],
                        'imagem'=>$_POST['Imagem'],
                        'descricao'=>$_POST['Descricao'],
                        'info_uteis'=>$_POST['Info_uteis']
                        ]   
                );
                header("Location: /admProdView");
            } else {
                static::$message = $resultado;
                return view("admin/adicionar_produto");
            }

            /*App::get('database')->insert('usuarios', [
                'nome'=>$_POST['nome'],
                'email'=>$_POST['email'],
                'senha'=>$_POST['senha'],
                'sexo'=>$_POST['genero']
            ]);*/

        /*App::get('database')->insert('usuarios', [
                'nome'=>$_POST['nome'],
                'email'=>$_POST['email'],
                'senha'=>$_POST['senha'],
                'sexo'=>$_POST['sexo']
            ]
        );*/
    }

    public function delete() {
        //echo 'chegou no delete';
        App::get('database')->delete('produtos', $_POST);
        $this->admProdView();
    }
    

        
    public function edit()
    {
        $params = [
            "nome" => $_POST["nome"],
            "preco" => $_POST['preco'],
            "descricao" => $_POST["descricao"],
            "imagem" => $_POST["imagem"],
            "id" => $_POST["id"]
        ];
    
        App::get('database')->editProduto('produtos', $_POST);
        return view('admin/administrativaProdutos');
    }      

    public function listagem_produtos() {
        session_start();
        $_SESSION['mensagem'] = "a";
        //só startando a variavel global aq;
        $produtos = App::get('database')->listagemProdutos('categorias','produtos',$_POST['mensagem']);
        //pra dentro do QueryBuilder eu não ter de usar $_POST['mensagem'] eu já passo a mensagem aq pra acessar direto lá(preguiça)
        //print_r($produtos);
        //var_dump();
        static::$categoria = $_POST['mensagem'];
        static::$message = $_SESSION['mensagem'];
        /*por ser uma variavel global(que em php se perde se vc tentar acessar um 3° arquivo, por exemplo, tá aq, passou pra query builder, voltou pra cá e foi pra listagem_produtos
        ela se perde, mas como só foi pra querybuilder e voltou pra cá e logo dps é passada pra uma variavel da UsersController que vai ser acessada por uma função dq, ela fica disponivel pra 
        quem chamou)*/
        return view('admin/listagem_produtos', compact('produtos'));
    }

    public function busca_produto() {
        session_start();
        $_SESSION['message'] = "a";
        if (isset($_SESSION['categ'])) {
            unset($_SESSION['categ']);
        }
        $produtos = App::get('database')->busca_produto('produtos', $_POST);
        static::$message = $_SESSION['message'];
        session_destroy();
        session_start();
        $_SESSION['categ'] = "a";
        $_SESSION['produto'] = $produtos;
        static::$categ = App::get('database')->busca_produto('produtos', $_POST);
        return view('admin/busca_produtos', compact('produtos'));
    }
    
    protected function alreadyExists() {
        //if($_POST['nome'] != App::get('database')->read('usuarios', 'nome'));
        //$_POST['nome'];
        return App::get('database')->validUser('usuarios', $_POST);
    }

    //CORRIGINDO MERGING A PARTIR DQ!!!!!!!!!!!!!!//
    


}


/*<?php
    if($_POST) {
        $senha          = $_POST['senha'];
        $senhaConfirma  = $_POST['senha_confirma'];
        if ($senha == "") {
            $mensagem = "<span class='aviso'><b>Aviso</b>: Senha não foi alterada!</span>";
        } else if ($senha == $senhaConfirma) {
            $mensagem = "<span class='sucesso'><b>Sucesso</b>: As senhas são iguais: ".$senha."</span>";
        } else {
            $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
        }
        echo "<p id='mensagem'>".$mensagem."</p>";
    }
?>*/
?>