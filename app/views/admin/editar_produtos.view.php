<!DOCTYPE html>
<html>

    <head>
        <title>Editar-produto</title>
        
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../public/css/usuary.css">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
    <body>
        <?php
            use App\Controllers\ProdutosController;
            //to requerindo a classe UsersController para poder utilizar uma função static e uma variavel static de lá que vão permitir fazer a validação de senha/nome/email
            if(!isset($_GET['id'])) {
                $_GET['id'] = ProdutosController::getId();
                echo $_GET['id'];
                echo "<br/>";
            }
        ?>
        <div class="container">
            <div class="title">Editar(Modifique somente oq deseja mudar)</div>
            <!--action="adicionar_usuario-->
            <form method="POST" action="editar_produto" id="badform">
                <!--Essa formulario é enviado passando a url adicionar_usuario pelo método POST(tudo isso é necessario para que o index consiga concluir todas as etapas da rota)-->
                <div class="produto-details">
                    <div class="input-box">
                        <span class="details">Novo nome do produto</span>
                        <input type="text" placeholder="Escreva o nome do produto" name="nome">
                        <!--<input type="hidden" name="id" value=<?= $_GET['id'] ?>></input>-->
                        <input type = "hidden" name = "id" value=<?= $_GET['id'] ?>>
                        <?php
                            //if(!isset($_SESSION['recado'])) { // da pra tirar essa parte e manter só a segunda;
                                /* 
                                    essa parte serve para tudo aqui do código, basicamente essa variavel é uma variavel global inicializada na chamada 
                                    da PagesController, ela é responsavel por verificar se trata-se da primeira chamada da pagina ou se o usuario já inseriu algum valor e está errado
                                    basicamente essa variavel na primeira vez que passa aq tem um valor ou seja não está vazia oq está sendo verificado com o isset, essa variavel global
                                    só fica vazia a partir do momento em que o formulario é enviado para a UsersController, local onde as verificações ocorrem
                                */
                                if( ProdutosController::getMessage() == "Produto já cadastrado") {
                                    //métodos estaticos: estou utilizando a classe UsersController que é inserida no bloco php no inicio da pagina e sua função estatica que retorna a variavel presente lá com as msgs
                                    echo "Nome já utilizado";
                                }
                            //}
                        ?>
                    </div>
                    <div class="input-box">
                        <span class="details">Novo Preco</span>
                        <input type="text" placeholder="Digite novo preco" name="preco" >
                    </div>
                    <div class="input-box">
                        <span class="details">descricao</span>
                        <input type="text" placeholder="Digite a nova descricao" name="descricao">
                    </div>
                    <div class="input-box">
                        <span class="details">info uteis</span>
                        <input type="text" placeholder="Digite nova info util" name="info_util">
                    </div> 
                </div>
                <div class="button">
                    <input type="submit" value="Editar" id="envia">                   
                </div>
            </form>
        </div>

    </body>
</html>