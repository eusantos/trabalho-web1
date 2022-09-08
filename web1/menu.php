<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">

      <script src="script/jquery-3.5.1.js"></script>

      <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
      <div>
          <header id="cabecalho">
              <nav id="menu">
                  <ul>
                      <li id="logotipo">Blog Inovação Tecnologica</li>
                      <li><a href="index.php">Home</a></li>
                      <li><a href="articles.php">Artigos</a></li>
                      <?php if ($login): ?>
                        <li><a href="logout.php">Logout</a></li>
                      <?php else: ?>
                        <li><a href="register.php">Login/Sign In</a></li>
                      <?php endif; ?>
                  </ul>
              </nav>
          </header>
      </div>
  </body>
</html>
