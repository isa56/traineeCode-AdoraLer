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
        
        $this->routes['GET'][$uri] = $controller;
        /*
            Como estamos requerindo o documento com todas as rotas e chamadas no require $file do construtor (load),
            as chamadas são feitas lá e o recebimento da $uri, $controller aqui
        */

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
        passando(ambos no parametro da função, o qual é recebido a partir do Request.php que retorna método e url)
        2--Como esse array da $router pode ter esses valores sendo que em nenhum
        momento estamos passando para ele?: Como estamos requerindo a $routes.php
        lá iremos requisitar todas as uri e caminhos que queremos chamando as funções
        get e post que passarão os valores para o array $routes dessa classe aq*/
        /*
            ao passar somente $this->routes[$requestType] oque se obtém é
            a $uri que equivale ao segundo parametro do $this->routes
            exemplo: supondo o $requestType sendo um método GET o segundo parametro pode variar entre todos os GET desse vetor($this->routes), porém como queremos só o adm
            utilizamos da array_key_exists para verificar se existe um "adm" no segundo parametro desse vetor

        */
        //print_r($this->routes[$requestType]);
        //echo '</br>';
        if (array_key_exists($uri, $this->routes[$requestType])) {
            /*a partir dq a função callAction de $router.php é chamada
            Passando como parametro o que está contido em routes dividindo em duas partes
            ou seja, completando os dois parametros que serão passados na função
            um anterior ao @ sendo o $requestType e o segundo após @ sendo a $uri em si*/
            /*
                como exemplo é possivel citar o proprio adm comentado na parte logo acima, assim que é chamado o $this->routes[$requestType][$uri] ou seja $this->routes[GET][adm]
                o retorno dado por isso pode ser verificado na routes.php, porém já deixarei anotado aqui que sera PagesController@adm, sendo PagesController o documento que pretendemos acessar
                e adm a função dentro da PagesController que pretendemos utilizar para retornar a view da pagina adm
                
            */
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
                /* A função explode serve para separar essa string do resultado em uma parte anterior ao @ e uma parte após, o que vai equivaler os dois parametros necessarios 
                para a função callAction funcionar($controller,$action);
                */
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
        //ou seja não é necessario usar o require ou "use" do composer
        //echo $controller;
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        /*
            Essa parte é responsavel por criar uma nova classe do documento em que a pag que passamos a uri está ligada
            por exemplo, se você encaminha adm no url do site ela sera chamada pela index que vai chamar esse doc aqui
            chamando a função direct e passando como parametro os métodos que utilizamos(possivelmente get) junto a url(adm)
            dentro da direct ele verifica se no nosso this.routes(vetor que recebe todos os valores a partir da chamada da função na routes )
        */
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }
        
        return $controller->$action();
        /* 
            Se a url tiver sido adm a partir de um método get ele vai chamar a PagesController(função), sim trata-se da função presente no doc PagesController.php, o qual só é posisvel
            ser chamado pois colocamos a referencia a ele e no caso de um método post ao UsersController na autoload_classmap.php e na autoload_static.php
            a função então retorna oq está presente nessa função($PagesController->adm()) ou seja a view(admin/adm); para a index
        */
    }
}
