<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Wilmer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div class="container" style="max-width: 100vw !important;">
    <div class="row" style="background-color: lightblue; height: 100px; text-align: center;">
      <div class="col" style="margin-top: 32px; font-family: Verdana, sans-serif;">
        <p>Wilmer Sistemas</p>
      </div>
    </div>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <div class="row">
        <div class="col" >
          <?php include 'menu_horizontal.php'; ?>
        </div>
      </div>
    </nav>
    <div class="row">
      <div class="col-3" style="background-color: gray;">
        <?php include 'categorias.php'; ?>
      </div>
      <div class="col-8">
        <?php if (isset($_GET['pagina'])) {
          if ($_GET['pagina'] == 'produtos') {
            include 'produto_home.php';
          }
          if ($_GET['pagina'] == 'produto') {
            include 'produto_detalhe.php';
          }
          if ($_GET['pagina'] == 'sacola') {
            include 'sacola.php';
          }
          if ($_GET['pagina'] == 'meus_pedidos') {
            include 'meus_pedidos.php';
          }
          if ($_GET['pagina'] == 'realizar_pedido') {
            if (!isset($_SESSION['autenticado'])) {
              include 'login.php';
            } else {
              include 'realizar_pedido.php';
            }
          }
        } else {
          include 'produtos_destaque.php';
        } ?>
      </div>
    </div>
    <div class="row" style="background-color: #ccc;">
      E-Commerce
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>
</body>

</html>