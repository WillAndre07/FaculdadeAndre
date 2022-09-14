<?php
  include("banco.php");

  $filme = filter_input(INPUT_POST, 'filme', FILTER_SANITIZE_SPECIAL_CHARS);

  $resultado = "INSERT INTO filmes (nome) VALUES ('$filme')";
  $result_dados = mysqli_query($conn, $resultado);
  header("location: index.php");
  ?>