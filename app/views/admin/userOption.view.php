<?php 
    use App\Controllers\LoginController; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina de Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../../public/css/userOption.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Raleway&display=swap" rel="stylesheet">
    </head>
    <body>

        <?php include_once('app\views\includes\navbarAdm.php'); ?>
        <?php 
            //echo $_SESSION['total'];
            //echo $_SESSION['end'];
            //echo "</br>";
            $total_linhas = $_SESSION['total']; // passo o total de linhas retornado da UsersController para me auxiliar a criar os botões da paginação;
            $cont = 9; // me auxilia a passar o end para a UsersController na segunda chamada dessa página
            $y = 1; // me auxilia a númerar os botões
            //print_r($usuarios[0]);
        ?>
        <div class="container usersOption" style="padding: 0px;">
            <div class="card-body" style="margin: 0px;">
                <div class="row">
                    <div class="col">
                        <h4>Contas</h4>
                    </div>
                    <div class="col-auto" style="margin-bottom: 10px">
                        <a href="adicionar_usuario" ><button type="submit" class="btn btn-primary botaoCompraAdd">Novo usuario</button></a>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" >
                                <thead >
                                <tr class="dif">
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Editar</th>
                                    <th>Deletar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($usuarios as $key => $user) : ?>
                                        <?php if($key <= $_SESSION['end'] && $key > $_SESSION['end']-10) : ?>
                                            <!--Estou printando 10 por x aqui, por exemplo, se o usuario clica no botão de n2 sera passado um end equivalente ao n19 por um método GET para a UserOption
                                            lá essa $_GET['end'] sera passada para uma $_SESSION['end'] que sera retornada aqui nessa parte, logo esse if fica: if($key <=19 && $key > 9) faça, <=19 e >9 pois estou
                                            printando de 10 em 10 e o vet($usuarios) começa do 0-->
                                        <tr>
                                            <td class="td"><?= $user->nome; ?></td>
                                            <td class="td"><?= $user->email; ?></td>
                                            <td>
                                                <div style="display: flex;">
                                                <!--action = "editar_usuario-->
                                                    <form method = "GET" action = "editar_usuario?">
                                                        <input type = "hidden" name = "id" value=<?= $user->id; ?>></input>
                                                        <button type="submit" class="btn botaoCompra"><i class="bi bi-pencil-square"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <div style="display: flex;">
                                                    <form method = "POST" action = "delete_usuario">
                                                        <input type = "hidden" name="id" value=<?= $user->id; ?>></input>
                                                        <button type="submit" class="btn botaoCompra"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-auto;display:flex;justify-content:center">
                <?php for($i = 1;$i<$total_linhas;$i = $i+9) : ?> <!--Se-->
                    <form method = "GET" action = "userOption">
                        <input type = "hidden" name="end" value=<?= $cont ?>></input>
                        <button type="submit" class="btn botaoCompraAdd" style="border:1px solid;border-color:green"><?= $y ?></button>
                        <?php $y++; ?> <!--O y equivale ao número dos botões, aqui estou aumentando o número deles-->
                        <?php $cont = $cont+10; ?> <!--Me auxilia a passar o end para o UsersController, se tiverem 19 linhas na tabela, o primeiro botão vai 9 e o segundo 19
                                                        na hr de printar vou de >9-10 até <=9 e por ai vai, já que estou printando 10 por x-->                   
                    </form>
                <?php endfor; ?>
            </div>
        </div>
        <?php
            session_destroy();
            //destruindo sessão criada na UsersController responsavel por retornar o total de usuarios(rows) na tabela do banco de dados;
            //session_start();
            //$_SESSION['user'] = $user->id;
        ?>
    </body>
</html>