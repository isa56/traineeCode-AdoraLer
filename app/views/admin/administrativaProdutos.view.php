<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração produtos
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
    <link rel="stylesheet" href="../../../public/css/admProdutos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <?php include_once('app\views\includes\navbarAdm.php'); ?>

    <div class="container">
        <div class="editingButtons">
            <button type="button" class="btn btn-outline-light botaoEditar">
                <span class="material-icons-outlined">
                    add_circle_outline
                </span>
            </button>    
            <button type="button" class="btn btn-outline-light botaoEditar">
                <span class="material-icons">
                    mode_edit
                </span>
            </button>
        </div>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="../../public/img/livroconectadas1.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                    <h5 class="card-title">Título do card</h5>
                    <div class="card-text">
                        <p>Este é um card mais longo com suporte a texto embaixo.</p>
                        <p>Preço: R$20,00.</p>
                    </div>
                    <div class="Botaos">
                        <button type="button" class="btn btn-outline-light botaoEditar editarCard">
                            <span class="material-icons">
                                mode_edit
                            </span>
                        </button>
                        <button type="button" class="btn btn-outline-light botaoCompra botaoDeletar ">
                            <span class="material-icons-outlined">
                                delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="../../public/img/livroguiadefinitivo.jpg" alt="Imagem de capa do card">
                <div class="card-body">
                    <h5 class="card-title">Título do card</h5>
                    <div class="card-text">
                        <p>Este é um card mais longo com suporte a texto embaixo.</p>
                        <p>Preço: R$20,00.</p>
                    </div>
                    <div class="Botaos">
                        <button type="button" class="btn btn-outline-light botaoEditar editarCard">
                            <span class="material-icons">
                                mode_edit
                            </span>
                        </button>
                        <button type="button" class="btn btn-outline-light botaoCompra botaoDeletar ">
                            <span class="material-icons-outlined">
                                delete
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
