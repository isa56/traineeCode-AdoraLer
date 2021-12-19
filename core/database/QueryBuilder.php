<?php

namespace App\Core\Database;

use PDO;
use Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /////////////////    USUARIOS AQUI    //////////////////////////////////////////////

    public function selectAllUserOption($table) {
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
            //$_SESSION['total'] = $query2[0]; // atribui a variavel global só o número total de linhas da tabela;
            if(isset($_SESSION['total'])) { // isso não é mais necessario pois passei essa função somente para a UserOption
                /* se essa variavel tiver setada é por que a chamada dela veio da userOption que foi redirecionada para a UsersController, onde é setada
                a variavel global que $_SESSION['total'];
                */
                $_SESSION['total'] = $query2[0]; // atribui a variavel global só o número total de linhas da tabela;
            }
            return $query;
        } catch (Exception $e) {
            die($e->getCode() . '--' . $e->getMessage());
        }
    }

    /////////////////   FIM USUARIOS AQUI    //////////////////////////////////////////////

    //iniciando produtos//

    public function selectAllProdutos($table)
    {   
        if(isset($_SESSION['categ'])) {
            $query = "select id from tb_categorias";
            $query2 = "select categoria_id from tb_produtos";
            try {
                $query = $this->pdo->query($query);
                $query2 = $this->pdo->query($query2);
                //$query = $query->fetchAll(PDO::FETCH_OBJ);
                //print_r($query);
                
                $query = $query->fetchAll(PDO::FETCH_OBJ);
                $query2 = $query2->fetchAll(PDO::FETCH_OBJ);
                $array =[];
                $total = count($query2);
                $total2 = count($query);
                //var_dump();
                $i=0;
                for($i=0;$i<$total;$i++) {
                    $array[] = $this->getCategoria($_SESSION['array'][$i]->categoria_id);
                    //$array[] = $query[$query2[$i]->categoria_id-1]->categoria;
                }
                //var_dump;
                //var_dump();
                //var_dump();
                return $array;
            } catch (Exception $e) {
                die($e->getCode() . '--' . $e->getMessage());
            }
        } else {
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
    }

    public function getCategoria($id) {
        $query = "SELECT categoria from tb_categorias where id=$id";
        $query = $this->pdo->query($query);
        $query = $query->fetchAll(PDO::FETCH_OBJ);
        return $query[0]->categoria;
    }

    //terminando produtos//

    
    public function selectAll($table)
    {
        echo "entrou select all";
        echo "</br>";
        if (isset($_SESSION['categ'])) {
            $query = "select categoria from tb_categorias";
            echo "entrou select all 2";
            echo "</br>";
            var_dump(); 
        }
    
        if(isset($_SESSION['categ'])) {
            echo "entrou aqui";
            var_dump();
            $query = "select id from tb_categorias";
            $query2 = "select categoria_id from tb_produtos";
            try {
                $query = $this->pdo->query($query);
                $query2 = $this->pdo->query($query2);
               

                $query = $query->fetchAll(PDO::FETCH_OBJ);
                $query2 = $query2->fetchAll(PDO::FETCH_OBJ);
                $array = [];
                $total = count($query2);
                $i = 0;
                for ($i = 0; $i < $total; $i++) {
                    $array[] = $query[$query2[$i]->categoria_id - 1]->categoria;
                }
                $total2 = count($query);
   
                $i=0;
                for($i=0;$i<$total;$i++) {
                    $array[] = $this->getCategoria($_SESSION['array'][$i]->categoria_id);
                    
                }
     
                return $array;
            } catch (Exception $e) {
                die($e->getCode() . '--' . $e->getMessage());
            }
        } else {
            echo "entrou select all";
            echo "</br>";
            try {
                $query = "select * from tb_$table";
                //retorna o total de elementos da tabela
                $query2 = "SELECT COUNT(*) FROM tb_$table";
                
                $_SESSION['total'] = $query2[0]; // atribui a variavel global só o número total de linhas da tabela;

                return $query;
            } catch (Exception $e) {
                die($e->getCode() . '--' . $e->getMessage());
            }

            $_SESSION['total'] = $query2[0];
            //retorna o total de elementos da tabela
            try {
                $query = $this->pdo->query($query);
                

                $query = $query->fetchAll(PDO::FETCH_OBJ);
                

                $query2 = $this->pdo->query($query2);
                $query2 = $query2->fetch();
                $_SESSION['total'] = $query2[0]; // atribui a variavel global só o número total de linhas da tabela;
                return $query;
            } catch (Exception $e) {
                die($e->getCode() . '--' . $e->getMessage());
            }
        }
    }

    /*public function getCategoria($id) {
        $query = "SELECT categoria from tb_categorias where id=$id";
        $query = $this->pdo->query($query);
        $query = $query->fetchAll(PDO::FETCH_OBJ);
        return $query[0]->categoria;
    }*/

    public function select()
    {
    }

    public function insert($table, $parametros)
    {
        
        $sql = ((sprintf(
            'INSERT INTO tb_%s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parametros)),
            ':' . implode(', :', array_keys($parametros))
        )));
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
        if (isset($parametro['categoria'])) {
            $query = "UPDATE tb_$table SET categoria = '" . $parametro['nome'] . "' where id = " . $parametro['id']; // não tá terminado, mas não interfere no usuarios pq o $parametro['categoria'] não vem setado de lá de qql forma
            $query = $this->pdo->query($query);
        } else {
            $query = "UPDATE tb_{$table} SET ";
            foreach ($parametro as $key => $choise) {
                if ($choise != "" && $key != "senha_confirma") {
                    //echo $choise;
                    //echo "</br>";
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
            } catch (Exception $e) {
                die($e->getCode() . "---" . $e->getMessage());
            }
            //ESSE PARAMETRO AQUI POSSIVELMENTE É DIFERENTE, COM NOVOS CAMPOS COMO POR EXEMPLO, SENHA E NOVA SENHA, EMAIL E NOVO EMAIL, NOME E NOVO NOME, SEXO E NOVO SEXO;
        }
    }
    public function editProduto($table, $parametro)
    {
        $sql = "UPDATE tb_{$table} SET ";
        foreach ($parametro as $key => $parametros) {
            $sql = $sql . "{$key} = '{$parametro}',";
        }
        $sql = rtrim($sql, " " . ",");
        $sql = $sql . " WHERE id = {$parametro['id']}";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function delete($table, $parametro)
    {
        //print_r($parametro);
        //echo $parametro['id'];
        //echo 'chegou no delete query builder';
        /*Existem 2 deletes chegando aqui, um da categorias e um do userOption, caso o comentario seja da categorias */
        if (isset($parametro['categoria'])) {
            //$query = "delete from tb_produtos where categoria_id = " .$parametro['id'];
            $query = "SELECT id from tb_categorias where categoria = 'default'"; // localizando onde o id do default está em tb_categorias
            $query = $this->pdo->query($query);
            $default = $query->fetch();
            if (empty($default))
            {
                echo 'entrou';
                $query2="insert into tb_categorias(categoria) values('default')";
                $query2=$this->pdo->query($query2);
                $query = "SELECT id from tb_categorias where categoria = 'default'"; // localizando onde o id do default está em tb_categorias
                $query = $this->pdo->query($query);
                $default = $query->fetch();
            }
            $default = $default[0]; // passando diretamente o id para a $default
            $query = "UPDATE tb_produtos SET categoria_id = $default where categoria_id = " . $parametro['id']; // atualizando tb_produtos onde a categoria_id for igual a que a gente for excluir e colocando o id da categoria default
            $this->pdo->query($query);
            $query = "delete from tb_$table where id = " . $parametro['id']; // deletando o id da categoria que a gente quer deletar
            
            $this->pdo->query($query);
            header("Location: /categorias"); // voltando pra categorias
        } else {
            $query = "delete from tb_$table where id = " . $parametro['id']; // aqui a chamada meio da userOption por isso basta excluir a linha onde o id está localizado
            $this->pdo->query($query);
            //header("Location: /userOption"); // retornando pra userOption;
        }
        //echo 'entrou no if';

    }

    public function deleteCategorias($table, $parametro) {
        $query = "delete from tb_".$table." where id = '".$parametro['id']."'";
        $this->pdo->query($query);
        $query = "UPDATE id from tb_$table where id > ".$parametro['id']." id=id-1";
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

    public function validUser($table, $parametro)
    {
        //echo '<br/>';
        //echo '<br/>';
        if (isset($parametro['categoria'])) {
            $sql = "select categoria from tb_" . $table . " WHERE categoria='" . $parametro['nome'] . "'";
            $stmt = $this->pdo->query($sql);
            $nome = $stmt->fetch();
            if (empty($nome)) {
                return "correto";
            } else {
                if (!empty($nome)) {
                    return "nome já utilizado";
                }
            }
        } else {
            $sql = "select nome from tb_" . $table . " WHERE nome='" . $parametro['nome'] . "'";
            $stmt = $this->pdo->query($sql);
            $nome = $stmt->fetch();
            $sql = "select nome from tb_" . $table . " WHERE email='" . $parametro['email'] . "'";
            $stmt = $this->pdo->query($sql);
            $email = $stmt->fetch();
            if (empty($nome) && empty($email)) {
                return "correto";
            } else {
                if (!empty($nome) && !empty($email)) {
                    return "nome e email já utilizados";
                } else if (!empty($nome)) {
                    return "nome já utilizado";
                } else {
                    $_SESSION['foi'] = "n foi";
                    return "email já utilizado";
                }
            }
            
        }
    }
    function validProd($table, $parametro){
        if (isset($parametro['produto'])) {
            $sql = "select nome from tb_$table WHERE nome='" . $parametro['Nome'] . "'";
            $stmt = $this->pdo->query($sql);
            $nome = $stmt->fetch();
            $sql = "select categoria from tb_categorias WHERE categoria='" . $parametro['Categoria'] . "'";
            $stmt = $this->pdo->query($sql);
            $categoria = $stmt->fetch();
            if (empty($nome) && !empty($categoria)) {
                $sql = "select id from tb_categorias WHERE categoria='" . $parametro['Categoria'] . "'";
                $stmt = $this->pdo->query($sql);
                $categoria = $stmt->fetch();
                $_SESSION['categoria_id'] = $categoria[0];
                return "correto";
            } else if (empty($categoria)) {
                return "a categoria não existe";
            } else if (!empty($nome)) {
                return "o produto já existe";
            }
        }
    }
    function listagemProdutos($table, $table2, $parametro)
    {
        $query = "SELECT id FROM tb_" . $table . " WHERE categoria='" . $parametro . "'";
        try {
            //echo $query;
            $query = $this->pdo->query($query);
            $categoria = $query->fetch(PDO::FETCH_OBJ);
            if (empty($categoria)) {
                $_SESSION['mensagem'] = "Não tem";
                $produto = [];
                return $produto;
            } else {
                $query = "SELECT * FROM tb_" . $table2 . " Where categoria_id ='" . $categoria->id . "'";
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
                } catch (Exception $e) {
                    echo $e->getCode() . "---" . $e->getMessage();
                }
            }
        } catch (Exception $e) {
            echo $e->getCode() . "---" . $e->getMessage();
        }
    }
        function busca_produto($table, $parametro)
        {
            $query = "select * from tb_$table where nome='" . $parametro['mensagem'] . "'";
            $query = $this->pdo->query($query);
            $query = $query->fetchAll(PDO::FETCH_OBJ);
            if (empty($query)) {
                $_SESSION['message'] = "Não tem";
            }
            if (isset($_SESSION['categ'])) {
                //echo $query[0]->categoria_id;
                /* $query2 = "select * from tb_categorias";
            $query2 = $this->pdo->query($query2);
            $query2 = $query2->fetchAll(PDO::FETCH_OBJ); */
                //echo $_SESSION['produto'][0]->categoria_id;
                $total = count($_SESSION['produto']);
                $array = [];
                for ($i = 0; $i < $total; $i++) {
                    $query2 = "select categoria from tb_categorias where id =" . $_SESSION['produto'][$i]->categoria_id;
                    $query2 = $this->pdo->query($query2);
                    $query2 = $query2->fetchAll(PDO::FETCH_OBJ);
                    $query2 = $query2[0]->categoria;
                    $array[] = $query2;
                }
                return $array;
            }

            return $query;
        }


    public function selectAllCategorias ($table)
    {
        $query = "select * from $table";
        try{
            $stmt = $this->pdo->query($query);
            $stmt -> execute();
            return $stmt -> fetchAll(PDO::FETCH_CLASS);
        }
        catch (Exception $exc) 
        {
            die($exc-> getMessage());
        }
    }

    public function delete_categorias($table)
    {
        $query = "select * from $table";
        

    }
}



