<?php

namespace App\Core;
use Exception;

class Router
{
    /**
     * All registered routes.
     *
     * @var array
     */
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * Load a user's routes file.
     *
     * @param string $file
     */
    public static function load($file)
    {
        /* 1--função que está sendo chamada pela index
        cria um novo objeto dessa classe de forma estatica, adiciona(require) o $file
        ou seja as rotas como "complemento" de router e permite com que o que esteja
        em routes seja acessado aqui ao fim, ao fim retorna o objeto dessa classe
        para index, permitindo o acesso lá as funções aq e a $routes.php
        2--Logo em seguida na main a função $direct desse objeto retornado é
        chamada após acessar o Request.php para preencher os parametros
        da $direct();
        */
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * Register a GET route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function get($uri, $controller)
    {
        //echo $uri;
        //echo '<br/>';
        $this->routes['GET'][$uri] = $controller;
        /*echo '<pre>';
        print_r($this->routes);
        echo '</pre>';*/
    }

    /**
     * Register a POST route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Load the requested URI's associated controller method.
     *
     * @param string $uri
     * @param string $requestType
     */
    public function direct($uri, $requestType)
    {
        /*1--Oq está acontecendo aq é: ele ira verificar nesse array de routes
        se a $uri que estamos pesquisando está associada ao método que estamos
        passando(ambos no parametro da função)
        2--Como esse array da $router pode ter esses valores sendo que em nenhum
        momento estamos passando para ele?: Como estamos requerindo a $routes.php
        lá iremos requisitar todas as uri e caminhos que queremos chamando as funções
        get e post que passarão os valores para o array $routes dessa classe aq*/
        /*
            ao passar somente $this->routes[$requestType] oque se obtém é
            tanto a $uri que equivale ao segundo parametro do $this->routes
            quanto o $controller que foi passado ao chamar a função get ou post
        */
        if (array_key_exists($uri, $this->routes[$requestType])) {
            /*a partir dq a função callAction de $router.php é chamada
            Passando como parametro o que está contido em routes divididado em duas partes
            ou seja, completando os dois parametros que serão passados na função
            um anterior ao @ sendo o $requestType e o segundo após @ sendo a $uri em si*/
            //print_r($this->routes[$requestType]);
            //print_r(explode('@', $this->routes[$requestType][$uri]));
            return $this->callAction(
                    /*$requestType = tipo da requisição (get ou post);
                    $uri = path, etc*/
                    /*
                        passando os dois parametros para $routes
                        o que se obtém é o valor que foi inserido 
                        ao chamar a função get ou post dependendo
                        do $requestType
                    */
                ...explode('@', $this->routes[$requestType][$uri])
            );

        }
        //caso a rota não existe no $this->routes ele retorna uma Exception
        throw new Exception('No route defined for this URI.');
    }

    /**
     * Load and call the relevant controller action.
     *
     * @param string $controller
     * @param string $action
     */

     //$router->get('', 'PagesController@index');
     /* 
        Nesse exemplo oq ira para a função callAction 
        é a parte PagesController no parametro de $controller
        e a parte index no parametro de $action 
     */
    protected function callAction($controller, $action)
    {
        //echo '<br/>';
        /* aqui eu passo para $controller o local do 
        arquivo que eu desejo buscar
        logo apos crio um novo objeto da classe que 
        está nesse arquivo e envio para o $controller,
        poderia ter sido feito em outra variavel, mas decidiram 
        fazer na mesma parte
        do $controller*/
        /* Isso aqui está ocorrendo da seguinte forma: com o arquivo de autoloads_class e o static do vendor
        pelo oq eu entendi ele automaticamente carrega a classe do arquivo o qual estamos passando
        para o $controller*/
        $controller = "App\\Controllers\\{$controller}";
        //echo $controller;
        //echo '<br/>';
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return $controller->$action();
    }
}
