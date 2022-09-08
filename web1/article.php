<?php
  require "authenticate.php";
  require "articles_helper.php";
  require "db/db_utils.php";
?>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
      $conn = connect_db();

      $post_id = mysqli_real_escape_string($conn, $_GET["id"]);
      
      disconnect_db($conn);
    }
  }
?>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_GET["id"])) {
      $conn = connect_db();

      $post_id = mysqli_real_escape_string($conn, $_GET["id"]);
      
      disconnect_db($conn);
    }

    if (isset($_POST["post_id"]) && isset($_POST["comment"])) {
      $conn = connect_db();
      $post_id = mysqli_real_escape_string($conn, $_POST["post_id"]);
      $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
      $user_id = $_SESSION["user_id"];

      disconnect_db($conn);

      $sql = "INSERT INTO comments
              (post_id, user_id, content, dthr)
       VALUES ($post_id, $user_id, '$comment', NOW());"; 
      
      $result = run_sql($sql);
      
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

        <?php
          get_and_render($post_id);
        ?>
      </section>
      
      <?php include 'rodape.php';?>
    </div>
  </body>
</html>
