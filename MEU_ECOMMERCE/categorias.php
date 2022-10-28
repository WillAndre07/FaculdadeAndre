<?php
include 'conexao.php';
$sql_categorias = 'SELECT * from categorias order by id';
$sql_prepara = $conn->prepare($sql_categorias);
$sql_prepara->execute();

while ($categoria = $sql_prepara->fetch()) {
    if (($categoria['categoria_pai']) != null) {
        $identacao = '&nbsp;&nbsp;&nbsp;&nbsp;';
    } else {
        $identacao = '';
    }
    echo "<br>{$identacao}<a style='color: white; text-decoration: none;' href=\"?pagina=produtos&categoria={$categoria['id']}\" class=\"btn btn-link\">{$categoria['descricao']}</a>";
}
?>