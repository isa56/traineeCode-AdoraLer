<?php

namespace App\Controllers; // atribuindo caminho para este arquivo aqui
use App\Core\App; // utilizando função da App

class UsersController {

    public function create() {

            
            $senha = $_POST['senha'];
            $senhaConfirma  = $_POST['senha_confirma'];
            echo $senha . '----' . $senhaConfirma;
            if ($senha == "") {
                $mensagem = "<span class='aviso'><b>Aviso</b>: Senha não foi alterada!</span>";
                echo "<p id='mensagem'>".$mensagem."</p>";
                header("Location: /adicionar_usuario");
            } else if ($senha == $senhaConfirma) {
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
            } else {
                $mensagem = "<span class='erro'><b>Erro</b>: As senhas não conferem!</span>";
                echo "<p id='mensagem'>".$mensagem."</p>";
                header("Location: /adicionar_usuario");
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