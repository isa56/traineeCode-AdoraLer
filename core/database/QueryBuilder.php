<?php

namespace App\Core\Database;

use PDO;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll()
    {
        //$query = "select * from "
    }

    public function select()
    {

    }

    public function insert($table, $parametros)
    {
        //print_r($this->pdo);
        /*$sql = (sprintf('INSERT INTO %s (%s) VALUES (%s)', 
        $table, 
        implode(', ', array_keys($parametros)),
        ':'.implode(', :', array_keys($parametros))));*/
        $sql = ((sprintf('INSERT INTO tb_%s (%s) VALUES (%s)', 
        $table, 
        implode(', ', array_keys($parametros)),
        ':'.implode(', :', array_keys($parametros)))));
        //$sql = 'INSERT INTO tb_usuarios(nome, senha, email, sexo)values(:nome, :senha, :email, :sexo)';
        try {
            //$stt = $this->pdo->prepare($sql);
            //$stt->execute($parametros);
            $stmt = $this->pdo->prepare($sql);
            echo '<br/>';
            echo 'chegou aq';
            $stmt->execute($parametros);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function edit()
    {
         
    }

    public function delete()
    {
      
    }

    public function read()
    {
      
    }
}
