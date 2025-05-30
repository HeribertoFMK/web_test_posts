<?php
session_start();

include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Faz hash da senha antes de salvar
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $senhaHash);

    if ($stmt->execute()) {
        // Redireciona para login após registro com sucesso
        header('Location: login.php');
        exit();
    } else {
        $erro = "Erro ao cadastrar usuário. Talvez já exista.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Blog_test - Registro</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Registrar</h2>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
            <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>
        </form>
    </div>
</body>
</html>

