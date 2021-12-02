<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core\{Router, Request};


/* Router tem a função static load, logo não é necessario criar um objeto para
essa classe, então podemos simplesmente fazer Router::load() passando como
parametro dessa função o arquivo que ela pede acesso dentro da execução da
função. Esse arquivo contem a rota para todas as partes do sistema, logo
após isso, chamamos a função direct de Router
*/
Router::load('app/routes.php')//->direct(Request::uri(), Request::method());
    ->direct(Request::uri(), Request::method());
