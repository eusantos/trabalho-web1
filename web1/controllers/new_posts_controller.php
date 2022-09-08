<?php
  require "db/db_utils.php";
  require "authenticate.php";
?>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "GET" && $user_role == "admin") {
    if (isset($_GET["id"])) {
      $conn = connect_db();

      $post_id = mysqli_real_escape_string($conn,$_GET["id"]);
      
      disconnect_db($conn);

      $sql_find_category = "SELECT p.id as id, p.title as title, p.resume as resume, p.thumbnail_link as thumbnail_link, p.content as content, c.name as category 
        FROM posts p, categories c 
        WHERE p.id = $post_id
          AND p.category_id = c.id;";

      $result = run_query($sql_find_category);
      
      if($result){
        if (mysqli_num_rows($result) > 0) {
          $select_result = mysqli_fetch_assoc($result);

          $post_id = $select_result['id'];
          $title = $select_result['title'];
          $thumb_link = $select_result['thumbnail_link'];
          $resume = $select_result['resume'];
          $content = $select_result['content'];
          $category = $select_result['category'];
        }
      }
    }
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $user_role == "admin") {
    if (isset($_POST["title"]) && isset($_POST["thumb_link"]) && isset($_POST["resume"]) && isset($_POST["content"]) && isset($_POST["category"])) {
      
      $conn = connect_db();
      $post_id = "";
      if (isset($_POST["post_id"])){
        $post_id = mysqli_real_escape_string($conn,$_POST["post_id"]);
      }
      $title = mysqli_real_escape_string($conn,$_POST["title"]);
      $thumb_link = mysqli_real_escape_string($conn,$_POST["thumb_link"]);
      $resume = mysqli_real_escape_string($conn,$_POST["resume"]);
      $content = mysqli_real_escape_string($conn,$_POST["content"]);
      $category = mysqli_real_escape_string($conn,$_POST["category"]);
      
      disconnect_db($conn);

      $sql_find_category = "SELECT id, name 
              FROM categories 
              WHERE name = '$category';";

      $result = run_query($sql_find_category);
      if($result){
        if (mysqli_num_rows($result) > 0) {
          $select = mysqli_fetch_assoc($result);
          $category_id = $select["id"];
        } else {
          $sql = "INSERT INTO categories (name) 
                  VALUES ('$category');";
          run_query($sql);
          
          $result = run_query($sql_find_category);
          $select = mysqli_fetch_assoc($result);
          $category_id = $select["id"];
        }
      } 

      if ($post_id != ""){
        $sql = "UPDATE posts 
                SET title = '$title', resume = '$resume', thumbnail_link = '$thumb_link', content = '$content', category_id = $category_id, dthr = NOW()
                WHERE id = $post_id ;";
      } else {
        $sql = "INSERT INTO posts 
                (user_id, title, resume, thumbnail_link, content, category_id, dthr) 
        VALUES ($user_id, '$title', '$resume', '$thumb_link', '$content', $category_id, NOW());";
      }

      $result = run_sql($sql);

      $published = $result;
    }
  }
?>