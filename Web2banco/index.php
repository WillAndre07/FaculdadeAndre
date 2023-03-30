<?php

  include 'Classes/home_classe.php';
  include 'Classes/conexao_classe.php';

  $otela = new home_classe();
  $otela->criaPagina();

  $listaMenuTeste = new conexao_classe();
  $listaMenuTeste->conexao();

?>