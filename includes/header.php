<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meu Blog</title>
    <link rel="stylesheet" href="/web_test/assets/css/style.css">
</head>
<body>
    <header>
        <h1>📝 Meu Blog</h1>
        <nav>
            <a href="/web_test/index.php">Início</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="/web_test/dashboard.php">Painel</a>
                <a href="/web_test/create_post.php">Novo Post</a>
                <a href="/web_test/logout.php">Sair</a>
            <?php else: ?>
                <a href="/web_test/login.php">Login</a>
                <a href="/web_test/register.php">Cadastro</a>
            <?php endif; ?>
        </nav>
        <hr>
    </header>