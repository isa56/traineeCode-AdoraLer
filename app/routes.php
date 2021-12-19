<?php
use App\Controllers\ProdutosController;

//CATEGORIAS - get: 
$router->get('editarc', 'PagesController@editarc');
$router->get('categorias', 'CategoriasController@view');
$router->post('delete_categoria', 'CategoriasController@delete');
$router->post('criar_categorias', 'CategoriasController@create');
//CATEGORIAS - get:
$router->post('editar_categorias', 'CategoriasController@update');

//Sendo utilizado até o momento


//USUARIOS
$router->post('adicionar_usuario', 'UsersController@create');
$router->post('delete_usuario', 'UsersController@delete');
$router->post('view_usuario', 'UsersController@admOptions');
$router->post('edit_usuario', 'UsersController@edit');
$router->post('editar_usuario', 'UsersController@edit');
//$router->post('listagem_produtos', 'UsersController@listagem_produtos');
$router->post('login', 'LoginController@login');
//$router->post('listagem_produtos', 'ProdutosController@listagem_produtos');


//PRODUTO - post:
$router->post('adicionar_produto', 'ProdutosController@create');
$router->post('delete_produto', 'ProdutosController@delete');
$router->post('view_produto', 'ProdutosController@ProdView');
$router->post('editar_produto', 'ProdutosController@edit');
$router->post('listagem_produtos', 'ProdutosController@listagem_produtos');
$router->post('busca_produto', 'ProdutosController@busca_produto');
$router->post('editar_produtos', 'PagesController@editar_produtos');
//PRODUTO - get:
$router->get('admProdView', 'ProdutosController@admProdView');
$router->get('busca_produto','PagesController@busca_produto');
$router->get('delete_produto', 'ProdutosController@delete');


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

$router->get('admProd', 'PagesController@admProd');
$router->get('addProd', 'PagesController@addProd');
$router->get('categorias', 'CategoriasController@view');
$router->get('delete_usuario', 'PagesController@delete');
$router->get('userOption', 'UsersController@admOptions');
$router->get('editar_usuario', 'PagesController@edit');
//$router->get('listagemProdutos', 'UsersController@listagemProdutos');
$router->get('listagem_produtos', 'PagesController@listagem_produtos');
//Sendo utilizado até o momento
//Pages - post

$router->post('login', 'LoginController@login');
