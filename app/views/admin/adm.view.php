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

    <?php include_once('app\views\includes\navbarAdm.php'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <a href="userOption"> 
                            <img src="../../../public/img/usuario.jpg" href="userOption" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <a href="categorias">
                            <img src="../../../public/img/livroconectadas1.jpg" class="card-img-top">
                        
                        <div class="card-body">
                            <h5 class="card-title">Categorias</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card"> 
                        <a href="admProdView">
                            <img src="../../../public/img/livros.jpg" class="card-img-top">
                        </a>
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


