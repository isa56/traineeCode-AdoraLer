<!DOCTYPE html>
<html>

    <head>
        <title>Registrar-Usuario</title>
        
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../public/css/usuary.css">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
    <body>
        <?php
            use App\Controllers\UsersController; 
            //to requerindo a classe UsersController para poder utilizar uma função static e uma variavel static de lá que vão permitir fazer a validação de senha/nome/email
        ?>
        <div class="container">
            <div class="title">Registrar</div>
            <!--action="adicionar_usuario-->
            <form method="POST" action="adicionar_usuario" id="badform">
                <!--Essa formulario é enviado passando a url adicionar_usuario pelo método POST(tudo isso é necessario para que o index consiga concluir todas as etapas da rota)-->
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nome de Usuario</span>
                        <input type="text" placeholder="Escreva seu nome de Usuario" name="nome" required>
                        <?php
                            if(!isset($_SESSION['recado'])) { 
                                /* 
                                    essa parte serve para tudo aqui do código, basicamente essa variavel é uma variavel global inicializada na chamada 
                                    da PagesController, ela é responsavel por verificar se trata-se da primeira chamada da pagina ou se o usuario já inseriu algum valor e está errado
                                    basicamente essa variavel na primeira vez que passa aq tem um valor ou seja não está vazia oq está sendo verificado com o isset, essa variavel global
                                    só fica vazia a partir do momento em que o formulario é enviado para a UsersController, local onde as verificações ocorrem
                                */
                                if(UsersController::getMessage() == "nome e email já utilizados" || UsersController::getMessage() == "nome já utilizado") {
                                    //métodos estaticos: estou utilizando a classe UsersController que é inserida no bloco php no inicio da pagina e sua função estatica que retorna a variavel presente lá com as msgs
                                    echo "Nome já utilizado";
                                }
                            }
                        ?>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Digite seu Email" name="email" id="email" required>
                        <?php
                            if(!isset($_SESSION['recado'])) {
                                if(UsersController::getMessage() == "nome e email já utilizados" || UsersController::getMessage() == "email já utilizado") {
                                    echo "Email já utilizado";
                                }
                            }
                        ?>
                    </div>
                    <div class="input-box">
                        <span class="details">Senha</span>
                        <input type="password" placeholder="Digite sua senha" name="senha" required>
                        <?php
                            /*if($_SESSION['recado'] != "a") {
                                echo 'porra';
                                echo $_SESSION['recado']; 
                            }*/
                            if(!isset($_SESSION['recado'])) {
                                if(UsersController::getMessage() == "As senhas não conferem") {
                                    echo "As senhas não são iguais";
                                }
                            }
                                
                        ?>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirmar senha</span>
                        <input type="password" placeholder="Confirme sua senha" name="senha_confirma" required>
                        <?php
                            /*if($_SESSION['recado'] != "a") {
                                echo 'porra';
                                echo $_SESSION['recado']; 
                            }*/
                            if(!isset($_SESSION['recado'])) {
                                if(UsersController::getMessage() == "As senhas não conferem") {
                                    echo "As senhas não são iguais";
                                }
                            }
                                
                        ?>
                    </div> 
                </div>
                <div class="gender-details">
                    <input type="radio" name="genero" value="H" id="dot-1" required>
                    <input type="radio" name="genero" value="F"id="dot-2">
                    <input type="radio" name="genero" value="I"id="dot-3">
                    <span class="gender-title">Genero</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Homem</span>    
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Mulher</span>    
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefiro Não Informar</span>    
                        </label>
                    </div>
                </div>

                <!--<script type="text/javascript" language="javascript">
                        function valida_form (){
                            if(document.getElementById("email").value == ""){
                                //alert('Por favor, preencha o campo email');
                                document.getElementById("email").focus();
                                return false;
                            }
                            return true;
                        }
                    //var x = valida_form();
                    var x = valida_form();
                        if(x == false) {
                           //alert('entrouaq');
                           var x = document.getElementById("badform");
                           x.setAttribute("action", "adicionar_usuario");
                           x.setAttribute("method", "GET");
                           //alert(x.getAttribute('action'));
                        }
                </script>-->

                <div class="button">
                    <input type="submit" value="Registrar" id="envia">
                    
                </div>
            </form>
        </div>

    </body>
</html>
