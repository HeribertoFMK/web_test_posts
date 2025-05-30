<?php
// Se a sessão não tiver sido iniciada, inicia
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Retorna true se o usuário estiver logado (session existe).
 */
function isLoggedIn(): bool {
    return isset($_SESSION['usuario']);
}

/**
 * Se não estiver logado, redireciona para login.php e para a execução.
 */
function redirectIfNotLoggedIn(): void {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

