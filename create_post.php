<?php
include 'includes/config.php';
include 'includes/functions.php';
redirectIfNotLoggedIn();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Novo Post</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="form-container">
    <h2>Novo Post</h2>
    <!-- Atenção: enctype multipart/form-data -->
    <form action="save_post.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="titulo" placeholder="Título" required><br>
      <textarea name="conteudo" placeholder="Conteúdo" rows="5" required></textarea><br>
      <label>Imagem do post:</label><br>
      <input type="file" name="imagem" accept="image/*"><br><br>
      <button type="submit">Publicar</button>
    </form>
  </div>
</body>
</html>

