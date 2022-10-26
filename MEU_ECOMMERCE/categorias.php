<?php
include 'conexao.php';
$sql_prepara = $conn->prepare("SELECT * from categorias ORDER BY id");
$sql_prepara->execute();

while ($categoria = $sql_prepara->fetch()) {
  if (!empty($categoria['categoria_pai'])) {
    $space = '&nbsp;&nbsp;&nbsp;&nbsp;';
  } else {
    $space = '';
  }
  echo "{$space}<a href=\"?pagina=produtps&categoria={$categoria['id']}\" class=\"btn btn-link\">{$categoria['descricao']}</a><br> ";
}
