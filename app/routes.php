<?php

//Sendo utilizado até o momento
//USUÁRIO - post:
$router->post('adicionar_usuario', 'UsersController@create');
$router->post('delete_usuario', 'UsersController@delete');
$router->post('view_usuario', 'UsersController@admOptions');
$router->post('edit_usuario', 'UsersController@edit');
$router->post('editar_usuario', 'UsersController@edit');

//Sendo utilizado até o momento
//PAGES - get:
$router->get('', 'PagesController@index');
$router->get('contato', 'PagesController@contato');
$router->get('quem_somos', 'PagesController@quem_somos');
$router->get('login', 'PagesController@login');
$router->get('guia_mochileiro', 'PagesController@guiaMochileiro');
$router->get('produtos', 'PagesController@produtos');
$router->get('adicionar_usuario', 'PagesController@adicionar_usuario');
$router->get('adm','PagesController@adm');
$router->get('categorias', 'PagesController@categorias');
$router->get('admProd', 'PagesController@admProd');
$router->get('delete_usuario', 'PagesController@delete');
$router->get('userOption', 'UsersController@admOptions');
$router->get('editar_usuario', 'PagesController@edit');

//Sendo utilizado até o momento
//Pages - post

$router->post('login', 'LoginControllers@login');
