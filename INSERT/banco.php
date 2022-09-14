<?php
$servename = 'localhost';
$database = 'atividade';
$username = 'root';
$password = '';

//Criando conexão
$conn = mysqli_connect($servename,$username,$password,$database);

//Check
if(!$conn){
  die("Falha na coneção". mysqli_connect_error());
}

?>
