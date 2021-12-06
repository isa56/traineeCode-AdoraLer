<?php

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
    /*o get('config') retorna um vet, a parte do 'database' é passado como segundo parametro
    para o make(no array retornado da get('config') vai ser pego o valor do indice 'database'), que vai linkar isso a um novo querybuilder que vai estar linkado ao vet do bind com 'database' de indice*/
    /*aqui oq está sendo passado no final das contas é a string 'database' com o "link" para o querybuilder criado
    pois dentro da função get ele ira verificar se a $key 'database' database existe*/
));
