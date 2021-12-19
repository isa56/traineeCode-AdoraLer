<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../../../public/css/styles.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../../public/js/javaScript.js"></script>
    <title>AdoraLer | Início</title>

</head>

<body>

    <?php include_once('app\views\includes\navbarAdm.php');

    ?>
    <div class="pegatd">
        <div class="container">
            <H1 class="text-center">CATEGORIAS-Administração </H1><br>
            <div CLASS="ROW">
                <div class="col-md-12 col-sm-12">
                    <h2 class="text-center">Cadastro de categorias</h2>
                    <form name="fmCategorias" method="post" action="criar_categorias">
                        <label>Nome da Categoria:</label>
                        <input type="text" name="categoria" class="form-control" maxlength="50"><br>
                        <div class="d-grid gap-2">
                            <button onclick="alertausuario('mensagem do java')" class="btn btn-primary" type="submit">Cadastrar</button>
                        </div>

                    </form>
                    <br>
                    <hr />
                    <h2 class="text-center">Categorias cadastradas</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="dif">
                                            <th>Nome</th>
                                            <th>Editar</th>
                                            <th>Deletar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categorias as $categoria) : ?>

                                            <tr>

                                                <td class="td"><?= $categoria->categoria; ?></td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <form method="GET" action="editarc">
                                                            <?php if ($categoria->categoria != "default") : ?>
                                                                <input type="hidden" name="id" value=<?= $categoria->id; ?>>
                                                                <input type="hidden" name="categoria" value=1;>
                                                                <button type="submit" class="btn"><i class="bi bi-pencil-square"></i>
                                                            <?php endif; ?>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <form method="POST" action="delete_categoria">
                                                            <?php if ($categoria->categoria != "default") : ?>
                                                                <input type="hidden" name="id" value=<?= $categoria->id; ?>>
                                                                <input type="hidden" name="categoria" value=1; ?>
                                                                <button type="submit" class="btn"><i class="bi bi-trash"></i>
                                                            <?php endif; ?>
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
        </div>

</body>