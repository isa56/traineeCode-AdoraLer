<!DOCTYPE html>
<html lang="pt-br">

</html>
<html>

<head>
  <title>Livro Mochileiro</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,600;1,200;1,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/pagProdIndiv.css">
</head>

<body>
  <div class="container">
    <?php

    use App\Controllers\ProdutosController;

    $categoria = ProdutosController::getCateg();
    ?>
    <ul class="breadcrumbs">
      <li><a href="">Início</a></li>
      <li>></li>
      <li><a href="produtos">Estante</a></li>
      <li>></li>
      <li> Livro Mochileiro</li>
    </ul>
    <?php foreach ($produto as $produtos) : ?>
      <div class="row">
        <div class="col-5 col">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block " src='../../public/img/<?= $produtos->imagem; ?>.jpg' alt="Primeiro Slide">
              </div>
              <div class="carousel-item">
                <img class='d-block ' src='../../public/img/<?= $produtos->imagem; ?>1.jpg' alt="Segundo Slide">
              </div>
              <div class="carousel-item">
                <img class="d-block " src='../../public/img/<?= $produtos->imagem; ?>2.jpg' alt="Terceiro Slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Próximo</span>
            </a>
          </div>
        </div>
        <div class="col ">
          <div class="content">
            <h1><?= $produtos->nome ?></h1>
            <h2>Categoria: <?= $_SESSION['categoria'] ?></h2>
            <h3>Preço: <?= $produtos->preco ?></h3>
            <a href="#" class="btn btn-primary  botaoCompra">Comprar</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="description">
          <h1>Descrição</h1>
          <p>
            <?= $produto[0]->descricao ?>
          </p>
        </div>
      </div>
      <?php endforeach ?>
  </div>
  <a class="back_link" href="index.html">&larr;Voltar<a>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>