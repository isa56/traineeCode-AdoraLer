<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../../public/css/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
</head>
<body class="home">
    
    <?php include_once('app\views\includes\navbar.php'); ?>
    <!--Isso aqui é só para ter uma ideia, qql mudança é valida
    !-->

    <section class="head">
        <div class="container container-home text-center">
            <h1>Conheça nossos principais produtos</h1>
            <!--<i class="bi bi-arrow-down"></i>-->
        </div>
    </section>

    <section class="section-carousel">
        <div class="container container-home">
            
            <div id="slideshow" class="slide carousel">

                <!--Lista responsavel pelo número de partições do carousel-->

                <ol class="carousel-indicators">
                    <li data-target="#slideshow" data-slide-to="0" class="active"></li>
                    <li data-target="#slideshow" data-slide-to="1"></li>
                    <li data-target="#slideshow" data-slide-to="2"></li>
                </ol>

                <!--Local onde as imagens são inseridas, junto a título e paragrafo adicionais, caso necessario-->

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../../public/img/anuncio1.png" class="w-100"/>
                    </div>
                    <div class="carousel-item">
                        <img src="../../public/img/anuncio2.png" class="w-100"/>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Testando</h5>
                            <p>Isso aqui</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../../public/img/anuncio3.png" class="w-100"/>
                    </div>
                </div>

                <!--Responsavel pela movimentação do carousel-->

                <a class="carousel-control-prev expand-sm" href="#slideshow" data-slide-to="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>

                <a class="carousel-control-next carousel-control-next-expand-sm" href="#slideshow" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>

        </div>
    </section>

    <!--Area dos produtos adicionados!-->
    <!--Dar uma olhada nos cards-->
    <section class="section-body-home">
        
        <!--As divs ".col" tem o texto alinhado a esquerda por padrão, mas
        mudei no css pro centro-->

        <!--style="background-color: #F1C8C7;-->
        <div class="container container-home">
            <div class="categorias" style="text-align: center;">
                <h1>Navegue por categoria</h1>
                <div class="botoesCategoria">
                    <div style="background-image: url('../../public/img/logoRomance.jpg')" class="miniatura" id="romance">
                        <a href="#">
                        </a>
                    </div>
                    <div style="background-image: url('../../public/img/logoTerror.jpg')" class="miniatura" id="terror">
                        <a href="#">
                        </a>
                    </div>
                    <div style="background-image: url('../../public/img/logoFicção.jpg')" class="miniatura" id="ficcaoCientifica">
                        <a href="#">
                        </a>
                    </div>
                    <div style="background-image: url('../../public/img/logoInfantil.jpg')" class="miniatura" id="infantil">
                        <a href="#">
                        </a>
                    </div>
                    <div style="background-image: url('../../public/img/logoHeroi.jpg')" class="miniatura" id="herois">
                        <a href="#">
                        </a>
                    </div>
                    <div style="background-image: url('../../public/img/logoBiografia.jpg')" class="miniatura" id="biografia">
                        <a href="#">
                        </a>
                    </div>
                </div>
                <div class="contactPage-home">
                    <div class="contact-home">
                        <h4>Precisa falar com a gente?</h4>
                        <a href="#" class="btn btn-lg active mx-auto" role="button" aria-pressed="true">Saiba Mais!</a>
                    </div>
                </div>
                <h1>Lançamentos</h1>
            </div>
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="../../public/img/livroconectadas2.jpg" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title">Título do card</h5>
                        <p class="card-text">Este é um card mais longo com suporte a texto embaixo.</p>
                        <a href="#" class="btn btn-primary botaoCompra">Comprar</a>
                    </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="../../public/img/livroguiadefinitivo.jpg" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Título do card</h5>
                    <p class="card-text">Este é um card com suporte a texto embaixo.</p>
                    <a href="#" class="btn btn-primary botaoCompra">Comprar</a>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="../../public/img/livroconectadas1.jpg" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h5 class="card-title">Título do card</h5>
                    <p class="card-text">Este é um card maior com suporte a texto embaixo.</p>
                    <a href="#" class="btn btn-primary botaoCompra">Comprar</a>
                  </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="../../public/img/livroconectadas1.jpg" alt="Imagem de capa do card">
                    <div class="card-body">
                      <h5 class="card-title">Título do card</h5>
                      <p class="card-text">Este é um card maior com suporte a texto embaixo.</p>
                      <a href="#" class="btn btn-primary botaoCompra">Comprar</a>
                    </div>
                </div>
            </div>
            

            <!-- About Us: -->
            <div class="row info">

                <!-- Logo - About Us: -->
                <div class="col-md info-inside">
                    <img class="img-responsive mx-auto d-block" src="../../public/img/AdoraLer_Logo_sfundo.png" alt="Logo da empresa">
                </div>

                <!-- Info - About Us: -->
                <div class="col-md info-inside">
                    <h4>Quem somos nós</h4>
                    <p>Olá, somos a AdoraLer, uma livraria fundada em 2021 por apaixonados em histórias. Nosso objetivo é levar o mundo mágico da leitura para todos, não só incentivando novos leitores a ingressarem no mundo dos livros, como também trazendo novidades àqueles leitores de longa data!</p>
                    <a href="/quem_somos" class="btn btn-lg active mx-auto d-block" role="button" aria-pressed="true">Saiba Mais!</a>
                </div>

            </div>

        </div>


    </section>

    <?php require('app\views\includes\footer.php'); ?>

    <script src="../../public/js/jquery-3.6.0.min.js"></script>
    <script src="../../public/js/bootstrap.bundle.min.js"></script>
</body>
</html>