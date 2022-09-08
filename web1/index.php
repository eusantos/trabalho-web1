<?php
  
  require "authenticate.php";
  require "articles_helper.php";
  require "db/db_utils.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Inovação Tecnologica</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
  </head>
  <body>
    <div>
      <?php include 'menu.php';?>
      
      <section id="corpo">
        <?php include 'header.php';?>
        
        <p id="page-title">
          <?php
            echo 'Tudo o que acontece na fronteira do conhecimento';
          ?>
        </p>

        <?php if ($user_role == "admin"): ?>
          <button class="myButton" type="button"><a href="new_post.php">Novo artigo</a></button>
          <br>
          <br>
        <?php endif; ?>


        <?php
          get_and_render_list(5, "*")
        ?>
      </section>
      
      <?php include 'rodape.php';?>
    </div>
  </body>
</html>
