<?php

require 'vendor/autoload.php';
require 'core/boostrap.php';

use App\Core\{Router, Request};

Router::load('app/routes.php')
    ->direct(Request::uri(), Request::method());
