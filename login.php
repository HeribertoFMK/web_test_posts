<?php
session_start();

include('includes/config.php');
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verifica senha com password_verify
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario'] = $usuario;
            header('Location: dashboard.php');
            exit();
        } else {
            $erro = 'Usuário ou senha inválida!';
        }
    } else {
        $erro = 'Usuário ou senha inválida!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Blog_test - Login</title>
    <link rel="stylesheet" href="assets/css/style.css">   
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
            <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>
        </form>
    </div>  
</body>
</html>

