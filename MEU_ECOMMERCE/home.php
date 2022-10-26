<?php
include 'conexao.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wilmer E-Commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        banner
      </div>
      <div class="row">
        <div class="col">
          menu horizontal
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <?php include "categorias.php"; ?>
      </div>
      <div class="col-9">
        <?php
        if (isset($_GET['pagina'])) {
        } else {
          include 'produtos_destaque.php';
        }
        ?>
      </div>
    </div>
    <div class="row" style="background-color: #ccc;">
      teste
    </div>
  </div>


</body>

</html>