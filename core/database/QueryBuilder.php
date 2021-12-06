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

    public function selectAll($table)
    {
        $query = "select * from tb_$table";
        //retorna o total de elementos da tabela
        $query2 = "SELECT COUNT(*) FROM tb_$table";
        //echo($query2[0]);
        /*$query2 = $this->pdo->query($query2);
        $query2 = $query2->fetch();
        $_SESSION['total'] = $query2[0];*/
        //retorna o total de elementos da tabela
        //var_dump();
        try {
            $query = $this->pdo->query($query);
            //$query = $query->fetchAll(PDO::FETCH_OBJ);
            //print_r($query);
            
            $query = $query->fetchAll(PDO::FETCH_OBJ);
            //print_r($query);
            //echo '<br/>';*/

            $query2 = $this->pdo->query($query2);
            $query2 = $query2->fetch();
            $_SESSION['total'] = $query2[0]; // atribui a variavel global só o número total de linhas da tabela;
            return $query;
        } catch (Exception $e) {
            die($e->getCode() . '--' . $e->getMessage());
        }

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
            $stmt->execute($parametros);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        header("Location: /adm");
    }

    public function edit($table, $parametro)
    {
        print_r($parametro);
        echo "</br>";
        $query = "UPDATE tb_{$table} SET ";
        foreach($parametro as $key => $choise) {
            if($choise != "" && $key != "senha_confirma") {
                echo $choise;
                echo "</br>";
                $query = $query . "{$key} = '{$choise}',";
            }
        }
        $query = rtrim($query, " " . ",");
        /*
            retira a virgula no final da string, por exemplo: UPDATE tb_usuarios SET nome = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',id = '29',sexo = 'F',
            vai para UPDATE tb_usuarios SET nome = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',id = '29',sexo = 'F'
        */
        $query = $query . " WHERE id = {$parametro['id']}";
        echo "</br>";
        try {
            $query = $this->pdo->query($query);
            header("Location: /userOption");
        } catch(Exception $e) {
            die($e->getCode() . "---" . $e->getMessage());
        }
        //ESSE PARAMETRO AQUI POSSIVELMENTE É DIFERENTE, COM NOVOS CAMPOS COMO POR EXEMPLO, SENHA E NOVA SENHA, EMAIL E NOVO EMAIL, NOME E NOVO NOME, SEXO E NOVO SEXO;

    }

    public function delete($table, $parametro)
    {
        //print_r($parametro);
        //echo $parametro['id'];
        //echo 'chegou no delete query builder';
            $query = "delete from tb_".$table." where id = '".$parametro['id']."'";
            $this->pdo->query($query);
            //echo 'entrou no if';
        header("Location: /userOption");

    }

    public function read($table, $parametro)
    {
        
        /*try {
            $stmt = $this->pdo->prepare($sql);
            echo '<br/>';
            echo 'chegou aq';
            $stmt->execute($parametros);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }*/
    
    }

    public function validUser($table, $parametro) {
        //echo '<br/>';
        //echo '<br/>';
        echo "chegou";
        $sql = "select nome from tb_".$table. " WHERE nome='".$parametro['nome']."'"; 
        $stmt = $this->pdo->query($sql);
        $nome = $stmt->fetch();
        $sql = "select nome from tb_".$table. " WHERE email='".$parametro['email']."'";
        $stmt = $this->pdo->query($sql);
        $email = $stmt->fetch();
        if(empty($nome) && empty($email)) {
            return "correto";
        } else {
            if(!empty($nome) && !empty($email)) {
                return "nome e email já utilizados";
            } else if(!empty($nome)) {
                return "nome já utilizado";
            } else {
                $_SESSION['foi'] = "n foi";
                return "email já utilizado";
            }
        }
        /*print_r($usuario);
        if($usuario == "") {
            echo "dale";
        }
        echo '<br/>';*/
    }

    public function listagemProdutos($table,$table2, $parametro) {
        //$parametro = "produto";
        //echo "tá aq";
        $query = "SELECT id FROM tb_".$table." WHERE categoria='".$parametro."'";
        try {
            //echo $query;
            $query = $this->pdo->query($query);
            $categoria = $query->fetch(PDO::FETCH_OBJ);
            //if($categoria == false) {
            if(empty($categoria)) {
                $_SESSION['mensagem'] = "Não tem";
                $produto = [];
                return $produto;
            } else {
                $query = "SELECT * FROM tb_".$table2." Where categoria_id ='".$categoria->id."'";
                try {
                    $query = $this->pdo->query($query);
                    $categoria = $query->fetchAll(PDO::FETCH_OBJ);
                    
                    
                    //$object = new stdClass();
                    //https://github.com/symfony/symfony/issues/2470;
                    //$object = new \stdClass();
                    //$object->categoria = $parametro;
                    //$categoria[] = $object;
                    //print_r($categoria);
                    //var_dump;
                    
                    return  $categoria;
                } catch(Exception $e) {
                    echo $e->getCode() . "---" . $e->getMessage();
                } 
            }
        } catch(Exception $e) {
            echo $e->getCode() . "---" . $e->getMessage();
        }
        
    }
}
