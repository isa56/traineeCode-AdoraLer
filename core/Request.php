<?php

namespace App\Core;

class Request
{
    /**
     * Fetch the request URI.
     *
     * @return string
     */
    public static function uri()
    {
        //trim retira espaço no inicio e final da string
        return trim(
            /*parse_url interpreta a url
                1--Pelo oque eu entendi ele retorna a parte do path sem o /
                2-- retorn para a index auxiliando a carregar 
                a função direct do $Router.php
            */
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * Fetch the request method.
     *
     * @return string
     */
    public static function method()
    {
        /*retorna o método utilizado, ou seja, get ou post
        para ser utilizado pela index na função direct do $Router.php*/
        return $_SERVER['REQUEST_METHOD'];
    }
}
