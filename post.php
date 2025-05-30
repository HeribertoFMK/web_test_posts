<?php
include 'includes/config.php';
include 'includes/functions.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $conn->prepare("SELECT titulo, conteudo, imagem FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();
if (!$post) die("Post não encontrado.");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($post['titulo']) ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <a href="index.php">← Voltar</a>
  <h1><?= htmlspecialchars($post['titulo']) ?></h1>

  <!-- Exibe a imagem se existir e for válida -->
  <?php if (!empty($post['imagem']) && file_exists($post['imagem'])): ?>
    <div class="post-imagem">
      <img src="<?= htmlspecialchars($post['imagem']) ?>"
           alt="Imagem do post" style="max-width:100%;height:auto;">
    </div>
  <?php endif; ?>

  <div class="post-conteudo">
    <?= nl2br(htmlspecialchars($post['conteudo'])) ?>
  </div>

  <!-- resto: comentários, etc... -->
</body>
</html>

