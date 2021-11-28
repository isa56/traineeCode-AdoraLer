<?php

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
    /*aqui oq está sendo passado no final das contas é a string 'database'
    pois dentro da função get ele ira verificar se a $key 'database*/
));
