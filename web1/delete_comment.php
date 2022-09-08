<?php
  require "db/db_utils.php";
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
      $conn = connect_db();

      $comment_id = mysqli_real_escape_string($conn, $_GET["id"]);
      
      disconnect_db($conn);
    }

    $sql_select = "SELECT post_id FROM comments WHERE id = $comment_id;";

    $result = run_query($sql_select);
    if($result){
      if (mysqli_num_rows($result) > 0) {
        $select = mysqli_fetch_assoc($result);
        $post_id = $select["post_id"];
      

        $sql_delete = "DELETE FROM comments WHERE id = $comment_id;";
        
        $result = run_sql($sql_delete);
        
        header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/article.php?id=$post_id");
      }
    }

  }
?>