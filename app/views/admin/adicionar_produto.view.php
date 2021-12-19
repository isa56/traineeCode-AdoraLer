<!DOCTYPE html>
<html>

    <head>
        <title>Registrar-Produto</title>
        
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../public/css/usuary.css">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Raleway:wght@400;600&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
    <body>
        <?php
            use App\Controllers\ProdutosController; 
            //requerendo a classe ProdutosController para poder utilizar uma função static e uma variavel static de lá que vão permitir fazer a validação de senha/nome/email
        ?>
        <div class="container">
            <div class="title">Adicionar produto</div>
            <!--action="adicionar_usuario-->
            <form method="POST" action="adicionar_produto" id="badform">
                <!--Essa formulario é enviado passando a url adicionar_usuario pelo método POST(tudo isso é necessario para que o index consiga concluir todas as etapas da rota)-->
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nome do Produto</span>
                        <input type="text" placeholder="Escreva o nome do produto" name="Nome" required>
                        <input type="hidden"  name="produto" value=1 >
                        <input type="hidden"  name="Imagem" value="" >
                        <input type="hidden"  name="Descricao" value="" >
                        <input type="hidden"  name="Info_uteis" value="" >
                        <?php
                            /*if(!isset($_SESSION['recado'])) { 
                                /* 
                                    essa parte serve para tudo aqui do código, basicamente essa variavel é uma variavel global inicializada na chamada 
                                    da PagesController, ela é responsavel por verificar se trata-se da primeira chamada da pagina ou se o usuario já inseriu algum valor e está errado
                                    basicamente essa variavel na primeira vez que passa aq tem um valor ou seja não está vazia oq está sendo verificado com o isset, essa variavel global
                                    só fica vazia a partir do momento em que o formulario é enviado para a UsersController, local onde as verificações ocorrem
                                */ 
                                if(ProdutosController::getMessage() == "o produto já existe")  {
                                    //métodos estaticos: estou utilizando a classe UsersController que é inserida no bloco php no inicio da pagina e sua função estatica que retorna a variavel presente lá com as msgs
                                    echo "o produto já existe";
                                }
                            //}
                        ?>
                    </div>
                    <div class="input-box">
                        <span class="details">Preço</span>
                        <input type="text" placeholder="Digite o Preço" name="Preco" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Categoria</span>
                        <input type="text" placeholder="Categoria" name="Categoria" required>
                        <?php
                            if(ProdutosController::getMessage() == "a categoria não existe") {
                                echo "A categoria não existe";
                            }
                            
                        ?>
                    </div> 
                    <div class="input-box">
                        <span class="details">Imagem</span>
                        <input type="text" placeholder="Digite o nome do JPG" name="Imagem" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Criar" id="envia">
                    
                </div>
            </form>
        </div>

    </body>
</html>