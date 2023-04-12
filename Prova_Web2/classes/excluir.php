<?php
include 'Classes/conexao_classe.php';

$id = isset($_GET['id'])? $_GET['id']: '';
$sql = "DELETE FROM regiao where IDRegiao = $id";

$conexao = new conexao_classe();
$banco = $conexao->conexaoBanco();
$query = $banco->prepare($sql);
$query->execute();
header("Location: index.php");
?>