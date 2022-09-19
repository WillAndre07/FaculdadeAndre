<?php

include 'banco.php';

$id = $_GET['id'];
$busca = "SELECT * FROM filmes WHERE codigo = '$id'";
$todos = mysqli_query($conn, $busca);
$result = mysqli_fetch_assoc($todos);

printf("
  <form method='POST' action='processar-alteracao.php'>
    <table>
      <tr>
        <th>Id</th>
        <td><input type='text' name='codigo' readonly='true' value='%s'></td>
      </tr>
      <tr>
        <th>Nome</th>
        <td><input type='text' name='nome' value='%s'></td>
      </tr>
      <tr>
        <th>Resumo</th>
        <td><input type='text' name='resumo' value='%s'></td>
      </tr>
      <tr>
        <th>Ano</th>
        <td><input type='text' name='ano' value='%s'></td>
      </tr>
      <tr>
        <th>Imagem</th>
        <td><input type='text' name='imagem' value='%s'></td>
      </tr>
      <tr>
        <th>Complemento</th>
        <td><input type='text' name='complementos' value='%s'></td>
      </tr>
      </table>
      <input type='submit' value='Enviar' >
  </form>
"
  , $result['codigo']
  , $result['nome']
  , $result['resumo']
  , $result['ano']
  , $result['imagem']
  , $result['complementos']
);