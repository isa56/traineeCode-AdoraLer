<!DOCTYPE html>
<html lang="pt-br">

</html>
<html>

<head>
  <title>Estante Virtual</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/pagProdutos.css">
</head>

<body>

  <?php include_once('app\views\includes\navbar.php'); ?>
  <?php 
    use App\Controllers\ProdutosController;
    $categoria = ProdutosController::getCateg();
  ?>
  <?php
    $total_linhas = $_SESSION['total']; // passo o total de linhas retornado da UsersController para me auxiliar a criar os botões da paginação;
    $cont = 9; // me auxilia a passar o end para a UsersController na segunda chamada dessa página
    $y = 1; // me auxilia a númerar os botões
  ?>
  <div class="container">
    <h1>Estante Virtual</h1>
    <ul class="breadcrumbs">
      <li><a href="#">Início</a></li>
      <li>></li>
      <li>Estante Virtual</li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <form action="pesquisa" method="POST">
          <input type="text" name= "mensagem" size="50" placeholder="Oque está procurando" aria-label="Pesquisar">
          <button class="btn btn-outline-success search-btn botaoCompra" style="width:100px;">Pesquisar</button>
        </form>
    </div>
    <div class="card-deck">
      <div class="row">
        <?php foreach ($produtos as $key => $produto) : ?>
          <?php if ($key <= $_SESSION['end'] && $key > $_SESSION['end'] - 10) : ?>
            <div class="col colun">
              <div class="card">
                <img class="card-img-top" src='../../public/img/<?= $produto->imagem;?>.jpg' alt="Imagem de capa do card">
                <div class="card-body">
                  <h5 class="card-title"><?= $produto->nome; ?></h5>
                  <?php foreach ($categorias as $key => $categoria) : ?>
                    <?php if ($categoria->id == $produto->categoria_id) : ?>
                      <p class="card-text">Categoria: <?= $categoria->categoria; ?></p>
                    <?php endif; ?>
                  <?php endforeach; ?>
                  <p class="card-text">Preço: <?= $produto->preco; ?></p>
                  <form action="produto_individual" method="POST">
                    <input type="hidden" name="nome" value=<?=$produto->nome?>></input>
                    <button class="btn btn-primary  botaoCompra" value="Comprar">Comprar</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
    
    
    <a class="back_link" href="index.html">&larr;Voltar<a>
    <div style="margin:auto;display:flex;justify-content:center">
            <?php for ($i = 1; $i < $total_linhas; $i = $i + 9) : ?>
                <!--Se-->
                <form method="GET" action="produtos">
                    <input type="hidden" name="end" value=<?= $cont ?>></input>
                    <button type="submit" class="btn botaoCompraAdd" style="border:1px solid;border-color:#F7883F"><?= $y ?></button>
                    <?php $y++; ?>
                    <!--O y equivale ao número dos botões, aqui estou aumentando o número deles-->
                    <?php $cont = $cont + 10; ?>
                    <!--Me auxilia a passar o end para o UsersController, se tiverem 19 linhas na tabela, o primeiro botão vai 9 e o segundo 19
                                                        na hr de printar vou de >9-10 até <=9 e por ai vai, já que estou printando 10 por x-->
                </form>
            <?php endfor; ?>
    </div>
  </div>

  <?php require('app\views\includes\footer.php'); ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>