<?php
include 'includes/config.php';
include 'includes/functions.php';
redirectIfNotLoggedIn();

// Recebe dados
$titulo   = $_POST['titulo']   ?? '';
$conteudo = $_POST['conteudo'] ?? '';
$imagem   = null;

// Sevier upload
if (!empty($_FILES['imagem']['name']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $tmp   = $_FILES['imagem']['tmp_name'];
    $orig  = basename($_FILES['imagem']['name']);
    $ext   = pathinfo($orig, PATHINFO_EXTENSION);
    $novo  = uniqid('img_') . '.' . $ext;
    $dest  = 'assets/images/' . $novo;
    if (move_uploaded_file($tmp, $dest)) {
        $imagem = $dest;
    }
}

// Insere no banco (ajuste se usar user_id)
$stmt = $conn->prepare(
    "INSERT INTO posts (titulo, conteudo, imagem) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $titulo, $conteudo, $imagem);
$stmt->execute();

// Redireciona para ver o post recém-criado (usa o ID gerado)
$lastId = $conn->insert_id;
header("Location: post.php?id={$lastId}");
exit();

