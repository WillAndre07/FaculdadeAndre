<?php
include("banco.php");

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$busca = "SELECT * FROM filmes";
$todos = mysqli_query($conn, $busca);

$quantidade = 5;
$linhas =  mysqli_num_rows($todos);

$tr = ceil($linhas / $quantidade);
$inicio = ($quantidade * $pagina) - $quantidade;

$limite = mysqli_query($conn, "$busca LIMIT $inicio, $quantidade");



$anterior = $pagina - 1;
$proximo = $pagina + 1;



?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Array</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <table class="table">
    <th>Id</th>
    <th>Nome</th>
    <th>Resumo</th>
    <th>Ano</th>
    <th>Imagem</th>
    <th>Complemento</th>
    <?php
    while ($dados = mysqli_fetch_array($limite)) {
      $id = $dados["codigo"];
      $nome = $dados["nome"];
      $resumo = $dados["resumo"];
      $ano = $dados["ano"];
      $imagem = $dados["imagem"];
      $complemento = $dados["complementos"];
  ?>
    <tr>
      <td><?php echo $id?></td>
      <td><?php echo $nome;?></td>
      <td><?php echo $resumo;?></td>
      <td><?php echo $ano;?></td>
      <td><?php echo $imagem?></td>
      <td><?php echo $complemento;?></td>
      <td><?php echo "<a href='alterar.php?id=$id' class='btn btn-primary'>Editar</a>"?></td>
      <td><?php echo "<a href='deletar.php?id=$id' class='btn btn-primary'>Deletar</a>"?></td>
      </tr>
    <?php
    }
    ?>
  </table>
  <nav class="text-center">
    <ul class="pagination">
      <?php
      if ($pagina > 1) {
      ?>
        <li class="page-item"><a class="page-link" href="?pagina=<?php echo $anterior; ?>">Anterior</a></li>
      <?php
      }
      ?>

      <?php
      for ($i = 1; $i <= $tr; $i++) {
        if ($pagina == $i) {
          echo "<li class='page-item active'><a class='page-link' href='?pagina=<?php echo $i; ?>'>$i</a></li>";
        }
      }
      ?>
      <?php
      if ($pagina < $tr) {
      ?>
        <li class="page-item"><a class="page-link" href="?pagina=<?php echo $proximo; ?>">Próximo</a></li>
      <?php
      }
      ?>
    </ul>
  </nav>

  <form method="POST" action="processar.php">
    <div class="form-group">
      <label for="exampleFormControlInput1">Cadastro de Filme</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="filme" placeholder="Digite o Nome do Filme">
      <br>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="resumo" placeholder="Digite o Resumo">
      <br>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="ano" placeholder="Digite o ano do filme">
      <br>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="complemento" placeholder="Digite complemento">
      <br>
      <input type="submit" value="Enviar">
    </div>
  </form>  
</body>

</html>