<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../public/css/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Raleway&display=swap" rel="stylesheet">
</head>
<body class="body-login">
    

    <?php include_once('app\views\includes\navbar.php'); ?>
    <?php 
        use App\Controllers\LoginController; 
    ?>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="card-container d-flex justify-content-center align-items-center w-100">
            <div class="card w-100">
                <div class="card-header">
                    <h3>Entre na sua conta</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="login" >
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="nome@provedor.com" value="email" name="email">
                            <?php
                                if( LoginController::getMessage() == "email invalido") {
                                    //métodos estaticos: estou utilizando a classe UsersController que é inserida no bloco php no inicio da pagina e sua função estatica que retorna a variavel presente lá com as msgs
                                    echo "Email invalido!";
                                }
                            ?>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="*********" value="senha" name="senha">
                            <?php
                            if( LoginController::getMessage() == "senha incorreta") {
                                echo "Senha incorreta!";
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col col-8">
                                <div class="form-group botoes">
                                    <a href="adicionar_usuario"><input style="background-color: #E9ECEF;" value="Cadastrar" class="btn float-right login_btn ex-submit"></a>
                                </div>
                            </div>
                            <div class="col col-4">
                                <div class="form-group botoes">
                                    <input type="submit" value="LogIn" class="btn float-right login_btn" style="margin-right:20px" >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require('app\views\includes\footer.php'); ?>

    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/bootstrap.bundle.min.js"></script>
</body>
</html>
