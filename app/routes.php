<?php

//Sendo utilizado até o momento
//USUÁRIO - post:
$router->post('adicionar_usuario', 'UsersController@create');
$router->post('delete_user', 'UsersController@delete');
$router->post('view_user', 'UsersController@view');
$router->post('edit_user', 'UsersController@edit');
$router->post('editar_usuario', 'UsersController@editar');

//Sendo utilizado até o momento
//PAGES - get:
$router->get('', 'PagesController@index');
$router->get('contato', 'PagesController@contato');
$router->get('quem_somos', 'PagesController@quem_somos');
$router->get('login', 'PagesController@login');
$router->get('guia_mochileiro', 'PagesController@guiaMochileiro');
$router->get('produtos', 'PagesController@produtos');

