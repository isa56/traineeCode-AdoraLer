<?php



&name = 'trainee_adoraler';
&username = 'root';
&password = '';
&connection = 'mysql:host=127.0.0.1';

mysqli = new mysqli($connection, $username, &password, &name);

if($mysqli->connect_errno){
   echo "falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

}
?>
