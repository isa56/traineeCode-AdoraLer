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
        <div class="container usersOption" style="padding: 0px;">
            <div class="card-body" style="margin: 0px;">
                <div class="row">
                    <div class="col">
                        <h4>Contas</h4>
                    </div>
                    <div class="col-auto" style="margin-bottom: 10px">
                        <a href="adicionar_usuario" ><button type="submit" class="btn btn-primary">Novo usuario</button></a>
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
                                    <?php foreach($usuarios as $user) : ?>
                                    <tr> 
                                        <td class="td"><?= $user->nome; ?></td>
                                        <td class="td"><?= $user->email; ?></td>
                                        <td>
                                            <div style="display: flex;">
                                            <!--action = "editar_usuario-->
                                                <form method = "GET" action = "editar_usuario?">
                                                    <input type = "hidden" name = "id" value=<?= $user->id; ?>>
                                                    <button type="submit" class="btn"><i class="bi bi-pencil-square"></i>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="display: flex;">
                                                <form method = "POST" action = "delete_usuario">
                                                    <input type = "hidden" name="id" value=<?= $user->id; ?>>
                                                    <button type="submit" class="btn"><i class="bi bi-trash"></i>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            session_destroy();
            //session_start();
            //$_SESSION['user'] = $user->id;
        ?>
    </body>
</html>