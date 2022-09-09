<?php
  include("conexao.php");

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
  $quantidade = 5;
  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina']:1;
  $pagararquivo = array_chunk($array, $quantidade);
  $linhas = count($array);
  $calc = $linhas / $quantidade;
  $result = $pagararquivo[$pagina-1];
  $inicio = ($quantidade * $pagina)- $quantidade;

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
    <th>Nome</th>
    <th>Idade</th>
  <?php
    for($i=1;$i <= $quantidade;$i++){
  ?>
    <tr>
      <td><?php echo $array[$i]["Nome"];?></td>
      <td><?php echo $array[$i]["Idade"];?></td>
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
      for($i=1;$i < $linhas; $i++){
          if($i == $pagina){
            echo "<li class='page-item active'><a class='page-link' href='?pagina=<?php echo $i; ?>'>$i</a></li>";  
          }
      }
    ?>
    <?php 
      if($pagina < $calc){
    ?>
    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $proximo;?>">Próximo</a></li>
    <?php 
      }
    ?>
  </ul>
</nav>
</body>
</html>

