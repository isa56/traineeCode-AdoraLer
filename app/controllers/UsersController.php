<?php

namespace App\Controllers; // atribuindo caminho para este arquivo aqui
use App\Core\App; // utilizando função da App

class UsersController {

    public static $total;
    public static $categoria;
    public static $message;
    public static $id;

    public static function admOptions() {

        //if(!isset($_POST['start'])) {
            session_start(); // starta a sessão para acessar a QueryBuilder e buscar o número total de linhas na tabela na variavel $_SESSION['tabela'];
            $_SESSION['total'] = "a";
            //echo "aaaaaaa aqui";
            $usuarios = App::get('database')->selectAllUserOption('usuarios'); // requisita tudo da tabela usuarios;
            $total = $_SESSION['total']; // passa o valor do total de linhas da tabela tb_usuarios para uma variavel, para que eu possa fechar essa sessão e abrir uma com a userOption
            session_destroy(); // fechando a sessão
            session_start(); // abrindo uma nova sessão
            $_SESSION['total'] = $total; // atribuindo o total de linhas da tabela para a nova variavel global $_SESSION['total'];
        //}
        if(isset($_GET['end'])) { 
            $_SESSION['end'] = $_GET['end'];
            /* se não for a primeira vez acessando a userOption a gente vai receber de onde começar a exibir os usuarios por um método get na variavel $_GET['end']; 
            e retornar ele por uma variavel global $_SESSION['end']; pois precisamos acessar esse fim para imprimir todos os usuarios na tabela*/
        } else {
            $_SESSION['end'] = 9; // padrão é começar do 9 pois estou imprimindo 10 usuarios por vez;
        }
        return view('admin/userOption', compact('usuarios')); // retorno a view padrão e o compact com o vetor de usuarios retornado do Query Builder;

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

            //if()
            //echo 'passou o resultado';
            //echo $resultado . '---';
            $resultado = $this->alreadyExists();
            if($resultado == "correto") {
                //'entrou';
                $senha = $_POST['senha'];
                $senhaConfirma  = $_POST['senha_confirma'];
                //echo $senha . '----' . $senhaConfirma;
                if ($senha == $senhaConfirma) {
                    //echo 'entrou aqui';
                    //$mensagem = "<span class='sucesso'><b>Sucesso</b>: As senhas são iguais: ".$senha."</span>";
                    App::get('database')->insert('usuarios', [
                            'nome'=>$_POST['nome'],
                            'email'=>$_POST['email'],
                            'senha'=>$_POST['senha'],
                            'sexo'=>$_POST['genero']
                        ]   
                    );
                    header("Location: /userOption");
                } else {
                    //echo 'entrou nessa caralho';
                    //ISSO AQ FUNCIONA 1X SÓ
                    //$_SESSION['recado'] = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
                    static::$message="As senhas não conferem";
                    //echo "<p id='mensagem'>".$mensagem."</p>";
                    //$recado = $mensagem;
                    //header("Location: /adicionar_usuario");
                    return view("admin/adicionar_usuario");
                }
            } else {
                static::$message = $resultado;
                return view("admin/adicionar_usuario");
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
        App::get('database')->delete('usuarios', $_POST);
        $this->admOptions();
    }

    public function edit() {
        //echo 'chegou no edit';
        
        $resultado = $this->alreadyExists();
        if($resultado == "correto") {
            $senha = $_POST['senha'];
            $senhaConfirma  = $_POST['senha_confirma'];
            //echo $senha . '----' . $senhaConfirma;
            if ($senha == $senhaConfirma) {
                App::get('database')->edit('usuarios', $_POST);
            } else {
                static::$message="As senhas não conferem";
                static::$id = $_POST['id'];
                return view("admin/editar_usuario");
            }
        } else {
            static::$message= $resultado;
            //"?id={$_POST['id']}"
            static::$id = $_POST['id'];
            return view("admin/editar_usuario");
        }       
    }

    //TIRAR ESSA FUNÇÃO AQUI(DEVE FICAR NA PRODUTOS CONTROLLER)

    protected function alreadyExists() {
        //if($_POST['nome'] != App::get('database')->read('usuarios', 'nome'));
        //$_POST['nome'];
        return App::get('database')->validUser('usuarios', $_POST);
    }

}
?>