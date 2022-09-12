<?php
  include("banco.php");

  $array = [
    1 => ["Nome" => "André", "Idade" => 20],
    2 => ["Nome" => "Alisson", "Idade" => 22],
    3 => ["Nome" => "Eduardo", "Idade" => 21],
    4 => ["Nome" => "Marcos", "Idade" => 45],
    5 => ["Nome" => "Carl", "Idade" => 12],
    6 => ["Nome" => "Marlon", "Idade" => 17],
    7 => ["Nome" => "Samira", "Idade" => 45],
    8 => ["Nome" => "Camila", "Idade" => 34],
    9 => ["Nome" => "Zé", "Idade" => 19],
    10 => ["Nome" => "Robert", "Idade" => 19]
  ];

  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina']:1;

  $busca = "SELECT * FROM pessoa";
  $todos = mysqli_query($conn, $busca);

  $quantidade = 2;
  $linhas = count($array);

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
    <th>Idade</th>
  <?php
    while($dados = mysqli_fetch_array($limite)){
      $id = $dados["Codigo"];
      $nome = $dados["Nome"];
      $idade = $dados["Idade"];
  ?>
    <tr>
      <td><?php echo $id?></td>
      <td><?php echo $nome;?></td>
      <td><?php echo $idade;?></td>
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

