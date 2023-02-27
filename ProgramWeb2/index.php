<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atividade</title>
</head>
<body>

  <div class="div-1">
    <?php
      include 'classes.lista.php';
      $oLis = new Lista();
      $oLis->setSeq('lista_1');
      $oLis->setNome('lista_1');
      $oLis->setValor('André');
      $oLis->mostraComando();
    ?>
  </div>
  
</body>
</html>