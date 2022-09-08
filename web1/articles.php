<?php
  require "authenticate.php";
  require "articles_helper.php";
  require "db/db_utils.php";
?>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
      $conn = connect_db();

      $category_id = mysqli_real_escape_string($conn, $_GET["id"]);
      
      disconnect_db($conn);
    } else {
      $category_id = "*";
    }
  }
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
              
        <?php if ($user_role == "admin"): ?>
          <button class="myButton" type="button"><a href="new_post.php">Novo artigo</a></button>
          <br>
          <br>
        <?php endif; ?>


        <?php
          get_and_render_list(100, $category_id)
        ?>
      </section>
      
      <?php include 'rodape.php';?>
    </div>
  </body>
</html>
