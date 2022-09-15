<?php
  include("banco.php");

  $filme = filter_input(INPUT_POST, 'filme', FILTER_SANITIZE_SPECIAL_CHARS);
  $resumo = filter_input(INPUT_POST, 'resumo', FILTER_SANITIZE_SPECIAL_CHARS);
  $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_SPECIAL_CHARS);
  $complemento = filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_SPECIAL_CHARS);

  $resultado = "INSERT INTO filmes (nome,resumo,ano,complementos) VALUES ('$filme','$resumo','$ano','$complemento')";
  $result_dados = mysqli_query($conn, $resultado);
  header("location: index.php");
  ?>