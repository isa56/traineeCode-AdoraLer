<?php
$action = "adicionar_usuario";
?>


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
        <div class="container">
            <div class="title">Registrar</div>
            <!--action="adicionar_usuario-->
            <form method="POST" action=<?php $action ?>>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nome de Usuario</span>
                        <input type="text" placeholder="Escreva seu nome de Usuario" name="nome" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" placeholder="Digite seu Email" name="email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Senha</span>
                        <input type="text" placeholder="Digite sua senha" name="senha" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirmar senha</span>
                        <input type="text" placeholder="Confirme sua senha" name="senha_confirma" required>
                    </div> 
                </div>
                <div class="gender-details">
                    <input type="radio" name="genero" value="H" id="dot-1">
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
                <?php

                ?>
                <div class="button">
                    <input type="submit" value="Registrar">
                </div>
            </form>
        </div>
    </body>
</html>



                    

