<?php

include("banco.php");

$id = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_SPECIAL_CHARS);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_SPECIAL_CHARS);
$imagem = filter_input(INPUT_POST, 'imagem', FILTER_SANITIZE_SPECIAL_CHARS);
$complemento = filter_input(INPUT_POST, 'complementos', FILTER_SANITIZE_SPECIAL_CHARS);


  $resultado = "UPDATE filmes SET nome = '$nome', resumo = '$resumo', ano = '$ano', imagem = '$imagem', complementos = '$complemento' WHERE codigo = '$id'";
  $result_dados = mysqli_query($conn, $resultado);
  header("location: index.php");
  
