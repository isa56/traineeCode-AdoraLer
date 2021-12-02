<?php

namespace App\Controllers; // atribuindo caminho para este arquivo aqui
use App\Core\App; // utilizando função da App

class UsersController {

    public static $message;

    public function admOptions() {

        session_start();

        $usuarios = App::get('database')->selectAll('usuarios');
        //echo $usuarios[0]->nome;
        return view('admin/userOption', compact('usuarios'));
    }

    public static function getMessage() {
        return static::$message;
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
                    //var_dump();
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
    }

    public function edit() {
        //echo 'chegou no edit';
        App::get('database')->edit('usuarios', $_POST);
    }

    protected function alreadyExists() {
        //if($_POST['nome'] != App::get('database')->read('usuarios', 'nome'));
        //$_POST['nome'];
        return App::get('database')->validUser('usuarios', $_POST);
    }

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