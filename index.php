<?php
include 'includes/config.php';
include 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Blog - Página Inicial</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header>
    <h1>📝 Meu Blog</h1>
    <nav>
      <?php if (isLoggedIn()): ?>
        <a href="dashboard.php">Painel</a> |
        <a href="logout.php">Sair</a>
      <?php else: ?>
        <a href="login.php">Login</a> |
        <a href="register.php">Registrar</a>
      <?php endif; ?>
    </nav>
    <hr>
  </header>

  <main>
    <h2>Posts Recentes</h2>
    <?php
      $result = $conn->query("SELECT id, titulo, conteudo, imagem FROM posts ORDER BY id DESC");
      while ($post = $result->fetch_assoc()):
    ?>
      <article>
        <h3><a href="post.php?id=<?= $post['id'] ?>">
          <?= htmlspecialchars($post['titulo']) ?>
        </a></h3>
        <?php if (!empty($post['imagem']) && file_exists($post['imagem'])): ?>
          <img src="<?= htmlspecialchars($post['imagem']) ?>" alt="" style="max-width:200px;">
        <?php endif; ?>
        <p><?= nl2br(htmlspecialchars(substr($post['conteudo'], 0, 150))) ?>...</p>
      </article>
    <?php endwhile; ?>
  </main>
</body>
</html>

