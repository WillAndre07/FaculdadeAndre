<?php
  include("banco.php");

  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina']:1;

  $busca = "SELECT * FROM filmes";
  $todos = mysqli_query($conn, $busca);
  
  $quantidade = 2;
  $linhas =  mysqli_num_rows($todos);

  $tr = ceil($linhas / $quantidade);
  $inicio = ($quantidade * $pagina)- $quantidade;

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
    <th>Item</th>
    <th>Nome</th>
  <?php
    while($dados = mysqli_fetch_array($limite)){
      $id = $dados["id"];
      $nome = $dados["nome"];
  ?>
    <tr>
      <td><?php echo $id?></td>
      <td><?php echo $nome;?></td>
    </tr>
  <?php
  }
  ?>
  </table>
  <nav  class="text-center">
  <ul class="pagination">
    <?php
      if($pagina > 1){
    ?>
    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $anterior;?>">Anterior</a></li>
    <?php 
      }
    ?>
    
    <?php 
      for($i=1;$i <= $tr; $i++){
          if($pagina == $i){
            echo "<li class='page-item active'><a class='page-link' href='?pagina=<?php echo $i; ?>'>$i</a></li>";  
          }
      }
    ?>
    <?php 
      if($pagina < $tr){
    ?>
    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $proximo;?>">Próximo</a></li>
    <?php 
      }
    ?>
  </ul>
</nav>
</body>
</html>

