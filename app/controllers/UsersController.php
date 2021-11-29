<?php

namespace App\Controllers; // atribuindo caminho para este arquivo aqui
use App\Core\App; // utilizando função da App


$recado = "";
class UsersController {

    public function create() {

            //if()
            $resultado = $this->alreadyExists();
            //echo 'passou o resultado';
            //echo $resultado . '---';
            if($resultado == "correto") {
                'entrou';
                $senha = $_POST['senha'];
                $senhaConfirma  = $_POST['senha_confirma'];
                echo $senha . '----' . $senhaConfirma;
                if ($senha == $senhaConfirma) {
                    echo 'entrou aqui';
                    //var_dump();
                    //$mensagem = "<span class='sucesso'><b>Sucesso</b>: As senhas são iguais: ".$senha."</span>";
                    App::get('database')->insert('usuarios', [
                            'nome'=>$_POST['nome'],
                            'email'=>$_POST['email'],
                            'senha'=>$_POST['senha'],
                            'sexo'=>$_POST['genero']
                        ]   
                    );
                    header("Location: /login");
                } else {
                    $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
                    echo "<p id='mensagem'>".$mensagem."</p>";
                    //$recado = $mensagem;
                    //header("Location: /adicionar_usuario");
                }
            } else {
                echo $resultado;
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