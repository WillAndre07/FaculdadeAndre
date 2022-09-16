<?php

  $aNomes = [
    [
      "nome"  => "André",
      "idade" => 20
    ],
    [
      "nome"  => "Alisson",
      "idade" => 22
    ],
    [
      "nome"  => "Eduardo",
      "idade" => 21
    ],
    [
      "nome"  => "Marcos",
      "idade" => 45
    ],
    [
      "nome"  => "Carl",
      "idade" => 12
    ],
    [
      "nome"  => "Marlon",
      "idade" => 17
    ],
    [
      "nome"  => "Samira",
      "idade" => 45
    ],
    [
      "nome"  => "Camila",
      "idade" => 34
    ],
    [
      "nome"  => "Zé",
      "idade" => 19
    ],
    [
      "nome"  => "Robert",
      "idade" => 19
    ]
  ];

  $quantidade = 5;
  $pagina = $_GET['pagina'] ?? 1;
  $pagararquivo = array_chunk($aNomes, $quantidade);
  $linhas = count($aNomes);
  $calc = $linhas / $quantidade;
  $result = $pagararquivo[$pagina-1];
  $inicio = ($quantidade * $pagina)- $quantidade;

  $anterior = $pagina - 1;
  $proximo = $pagina + 1;
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paginação</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
<body>
  <table class="table">
    <th>Nome</th>
    <th>Idade</th>
    <?php
      if ($pagina) {
        foreach ($pagararquivo[$pagina-1] as $linha) {
          printf('
            <tr>
              <td>%s</td>
              <td>%s</td>
            </tr>
          '
          , $linha['nome']
          , $linha['idade']
        );
        }
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