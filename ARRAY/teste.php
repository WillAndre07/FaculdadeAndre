<?php
// Iniciar a sessão
session_start();

// Verificar se o array de sessão de notícias já existe, se não, criá-lo
if (!isset($_SESSION['noticias'])) {
    $_SESSION['noticias'] = array();
}

// Processar o envio do formulário de notícias
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar os dados do formulário (por exemplo, verificar se os campos não estão vazios)
    $titulo = $_POST['titulo'];
    $corpo = $_POST['corpo'];
    $data = $_POST['data'];

    // Criar um novo array de notícia com as informações do formulário
    $nova_noticia = array(
        'titulo' => $titulo,
        'corpo' => $corpo,
        'data' => $data
    );

    // Adicionar a nova notícia ao array de sessão de notícias
    array_push($_SESSION['noticias'], $nova_noticia);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meu Site de Notícias</title>
</head>
<body>
    <h1>Meu Site de Notícias</h1>

    <!-- Formulário de envio de notícias -->
    <form method="post" action="">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo"><br>

        <label for="corpo">Corpo:</label><br>
        <textarea id="corpo" name="corpo"></textarea><br>

        <label for="data">Data:</label><br>
        <input type="date" id="data" name="data"><br>

        <input type="submit" value="Enviar">
    </form>

    <hr>

    <!-- Exibir as notícias armazenadas na variável de sessão -->
    <?php foreach ($_SESSION['noticias'] as $noticia): ?>
        <h2><?= $noticia['titulo'] ?></h2>
        <p><?= $noticia['corpo'] ?></p>
        <p><small><?= $noticia['data'] ?></small></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>