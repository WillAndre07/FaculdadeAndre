<?php
include("banco.php");

$id = isset($_GET['id'])? $_GET['id']: '';
$query = "DELETE FROM filmes where codigo = $id";

mysqli_query($conn, $query);
header("Location: index.php");
?>
