<!DOCTYPE html>
<html lang="pt-br"></html>
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
        <div class="container">
			    <h1>Estante Virtual</h1>	
          <ul class="breadcrumbs">
            <li><a href="#">Início</a></li>
            <li>></li>
            <li>Estante Virtual</li>
          </ul>
          <div class="form-inline my-2 my-lg-0">
          <form action="pesquisa" method="POST">
            <label>Nome do livro</label>
            <input type="text" name= "mensagem" size="50" placeholder="Insira o nome do livro">
            <button style="width:100px;">Pesquisar</button>
          </form>
          </div>
        <div class="card-deck">
        <?php if(empty(ProdutosController::getMessage())) : ?>
                                        
        <?php elseif(ProdutosController::getMessage() == 'Não tem') : ?>
          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Inexistente></h5>
            <p class="card-text">Inexistente</p>
            <p class="card-text">Inexistente</p>
          </div>
        <?php else :?> 
        <?php foreach($produtos as $key => $produto):?>
          <div class="card">
            <img class="card-img-top" src=<?=$produto->imagem; ?>alt="Imagem de capa do card">
            <div class="card-body">
            <h5 class="card-title"><?= $produto->nome; ?></h5>
            <p class="card-text"><?=$categoria[$key];?></p>
            <p class="card-text"><?=$produto->preco;?></p>
            <a href="paginaGuiaMochileiro.html" class="btn btn-primary botaoCompra">Comprar</a>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <nav aria-label="Navegação de página exemplo">
          <ul class="pagination justify-content-center  paginacao">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Próximo</a>
            </li>
          </ul>
        </nav>
        <a class="back_link" href="index.html">&larr;Voltar<a>
        </div>

        <?php require('app\views\includes\footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>