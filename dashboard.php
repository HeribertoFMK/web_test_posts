<?php
include('includes/config.php');
include('includes/functions.php');

// Garante que, se não houver sessão válida, o usuário volte para login
redirectIfNotLoggedIn();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Olá, <?= htmlspecialchars($_SESSION['usuario']) ?>!</h1>
        <nav>
            <a href="create_post.php">Criar Post</a> |
            <a href="logout.php">Sair</a>
        </nav>
        <hr>
    </header>
    <main>
        <p>Este é o seu painel. Aqui você pode gerenciar seus posts.</p>
    </main>
</body>
</html>

