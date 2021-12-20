<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina de Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../public/css/listagemProdutos.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Raleway&display=swap" rel="stylesheet">
    </head>
    <body>
        
        <?php include_once('app\views\includes\navbar.php'); ?>
        <?php 
            //use App\Controllers\UsersController;
            use App\Controllers\ProdutosController;
            /*if(empty(UsersController::getMessage())) {
                echo "entrou aqui";
            } else if(UsersController::getMessage() == "Não tem") {
                $categoria = ['Categoria invalida'];
            }*/
            //if(!empty(UsersController::getMessage()))
            if(!empty(ProdutosController::getMessage())) {
                session_destroy();
                /*echo "</br>";
                echo "</br>";
                echo "entrou aqui KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK";
                echo "</br>";
                print_r($produtos);
                print_r($produtos[1]->categoria);
                echo "</br>";
                echo "</br>";
                $key = end($produtos);
                echo "</br>";
                echo "</br>";
                print_r($key);
                var_dump();*/
                /*$x = 0;
                print_r($usuarios);
                do {
                    $x++;
                } while($produtos[$x]->categoria!='a');
                echo "valor do x: ". $x;
                $a= $produtos[1];
                unset($protudos[$key]);
                $produtos[1] = "";
                */
            }
            /*echo "<br/>";
            echo "A PORRA DA MENSAGEM GIGANTE QUE TÁ AQUI E CIMA DJ IASGUJASH
            GASHASGHASUGASGHASUJGASHGIASJGASIJGOASJGSÇJGOSDKHJSDUHGIOGSPGKSDGJSDAGDGOKSDMLAGDSGAPSDOGMSDGOPMASPMG";
            echo "<br/>";
            echo UsersController::getMessage();
            echo "<br/>";*/
            /*echo "<br/>";
            echo "<br/>";
            echo "<br/>";
            echo UsersController::getMessage();
            echo "<br/>";
            echo "<br/>";
            echo "<br/>";*/
        ?>

        <div class="container form-background usersOption">
            
            <form method="POST" action="listagem_produtos" class="main" style="text-align:center;align-self:center;margin-right:-15px;margin-left:-15px">
                
                <h1>Listagem de Produtos por categoria</h1>
                <div class="form-background">
                        <div class="" style="text-align:center">
                            <label for="exampleFormControlInput1" class="form-label" style="text-align:center;font-size:20px">Digite a categoria que deseja pesquisar: </label>
                            <input class="form-control" type="text" name="mensagem" id="exampleFormControlTextarea1" rows="1"></input>
                        </div>
                        <div class="button">
                            <input type="submit" value="Registrar" id="envia"  style="background-color:pink "> 
                        </div>
                </div>			
       
            </form>

        </div>

        <div class="container usersOption" style="padding: 0px">
            <div class="card-body" style="margin: 0px;">
                <div class="row">
                    <div class="col">
                        <h4>Produtos:</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" >
                                <thead >
                                <tr class="dif">
                                    <th>Produto</th>
                                    <th>Categoria</th>
                                    <th>Preço</th>
                                    <th>Imagem</th>
                                    <th>Descrição</th>
                                    <th>Info uteis</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <!--if(empty(UsersController::getMessage()))-->
                                    <?php if(empty(ProdutosController::getMessage())) : ?>
                                        <!--echo "entrou no 1";-->
                                        <!--elseif(empty(UsersController::getMessage()))-->
                                    <?php elseif(ProdutosController::getMessage() == 'Não tem') : ?>
                                        <!--echo "entrou no 2";-->
                                        <tr> 
                                            <td class="td">Categoria inexistente</td>
                                            <td class="td">Categoria inexistente</td>
                                            <td class="td">Categoria inexistente</td>
                                            <td class="td">Categoria inexistente</td>
                                            <td class="td">Categoria inexistente</td>
                                            <td class="td">Categoria inexistente</td>
                                        </tr>
                                    <?php else :?> 
                                        <!--echo "entrou no 3";-->
                                        <?php foreach($produtos as $produto):?>
                                        <tr>
                                            <td class="td"><?= $produto->nome; ?></td>
                                            <td class="td"><?= ProdutosController::getCategoria() ?></td>
                                            <td class="td"><?= $produto->preco; ?></td>
                                            <td class="td"><?= $produto->imagem; ?></td>
                                            <td class="td"><?= $produto->descricao; ?></td>
                                            <td class="td"><?= $produto->info_uteis; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            //session_destroy();
            //session_start();
            //$_SESSION['user'] = $user->id;
        ?>
    </body>
</html>