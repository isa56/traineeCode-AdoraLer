<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../public/css/adm.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Raleway&display=swap" rel="stylesheet">
</head>
<body class="body-main-adm">

    <header>
        <div>
            <img src="../../../public/img/outrogatofundo.png" style="width: 150px;opacity: 0.9;"> 
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">

            <!--Botão relacionado ao menu para expandir ou diminuir ele em monitores pequenos-->

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu" style="outline: none;" >
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--Menu-->

            <div id="navbarMenu" class="navbar-collapse collapse">
                <a href="#" class="nav-item nav-link active"><i class="bi bi-people-fill"></i>Gerenciamento de usuário</a>
                <a href="categorias.html" class="nav-item nav-link"><i class="bi bi-tags-fill"></i>Categorias</a>
                <a href="administrativaProdutos.html" class="nav-item nav-link"><i class="bi bi-cart-fill"></i>Produtos</a>
                <button class="btn btn-danger nav-item"><i class="bi bi-door-open-fill"></i>Deslogar</button> 
            </div>

        </nav>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <img src="../../../public/img/usuario.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img src="../../../public/img/livroconectadas1.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Categorias</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <img src="../../../public/img/livros.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Produtos</h5>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/bootstrap.bundle.min.js"></script>
</body>
</html>

