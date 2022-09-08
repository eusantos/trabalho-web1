<?php
 
  function get_and_render_list($posts_number, $category_id){
    $matrix = get_posts($posts_number, $category_id);
    if($matrix){
      foreach($matrix as $row){
        render_list($row);
      }
    }
  }

  function get_posts($posts_number, $category_id){
    if ($category_id == "*"){
      $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $posts_number;";
    }else {
      $sql = "SELECT * FROM posts WHERE category_id = $category_id ORDER BY id DESC LIMIT $posts_number;";
    }
    $result = run_query($sql);
    $db_matrix = result_to_matrix($result);
    return $db_matrix;
  }

  function render_list($row){
    require "authenticate.php";
    echo "<div class=\"container\">";
    echo  "<div class=\"Titulo\"><h1><a href=\"article.php?id=".$row["id"]."\">".$row["title"]."</a></h1></div>";
    echo  "<div class=\"Tumbnail\"><img src=\"".$row["thumbnail_link"]."\" style=\"width: 200px;\" ></div>";
    echo  "<div class=\"conteudo\">".$row["resume"]."</div>";
    echo  "<div class=\"editar-deletar\">";
    if ($user_role == "admin") {
      echo  "<button class=\"myButton\" type=\"button\"><a href=\"new_post.php?id=".$row["id"]."\">Editar</a></button>";
      echo "<br>";
      echo "<br>";
    }
    echo  "</div>";
    echo "</div>";
    echo "<br>";
  }

  function get_and_render($post_id){
    $matrix = get_post($post_id);
    if($matrix){
      foreach($matrix as $row){
        render_article($row);
      }
    }
  }

  function get_post($post_id){
    $sql = "SELECT * FROM posts WHERE id = $post_id;";
    $result = run_query($sql);
    $db_matrix = result_to_matrix($result);
    return $db_matrix;
  }

  function get_and_render_comments($post_id){
    $matrix = get_comments($post_id);
    if($matrix){
      foreach($matrix as $row){
        render_comments($row);
      }
    }
  }

  function get_comments($post_id){
    $sql = "SELECT c.*, u.name FROM comments c, users u where c.user_id = u.id and c.post_id = $post_id order by c.id;";
    $result = run_query($sql);
    $db_matrix = result_to_matrix($result);
    return $db_matrix;
  }

  function render_article($row){
    require "authenticate.php";
    echo $row[1];
    echo "<div class=\"container_article\">";
    echo  "<div class=\"Titulo\"><h1>".$row["title"]."</h1></div>";
    echo  "<div class=\"conteudo\">".$row["content"]."</div>";
    echo  "<div class=\"Editar-deletar\">";
    if ($user_role == "admin") {
      echo  "<button class=\"myButton\" type=\"button\"><a href=\"new_post.php?id=".$row["id"]."\">Editar</a></button>";
      echo "<br>";
      echo "<br>";
    }
    echo  "</div>";
    if ($login) {
      render_comentar($row);
      echo "<br>";
    } else {
      echo "<h1>Apenas usuarios logados podem comentar!</h1>";
    }
    echo "</div>";
    echo "<br>";
    
  }

  function render_comentar($row){
    echo "<div class=\"comentar\">";
    echo "  <div class=\"novo_comentario\">";
    echo "    <div class=\"novo_comentario_titulo\"><h1>Comente essa publicação</h1></div>";
    echo "    <div class=\"comentario_container\">";
    echo "      <form action=\"article.php?id=".$row["id"]."\" method=\"post\">";
    echo "        <div class=\"comentario\">";
    echo "          <label>Comentario*</label><br>";
    echo "          <textarea type=\"textarea\" placeholder=\"Seu comentário\" class=\"new_content_input\" name=\"comment\" maxlength=\"300\" maxrows=\"2\" required=\"required\" aria-required=\"true\" style=\"width: 1000px; height: 50px;\"></textarea>";
    echo "          <input type=\"hidden\" name=\"post_id\" value=\"".$row["id"]."\"><br>";
    echo "        </div>";
    echo "        <div class=\"salvar\">";
    echo "          <button type=\"submit\" class=\"myButton\">Postar</button>";
    echo "        </div>";
    echo "      </div>";
    echo "    </form> ";
    echo "  </div>";
    get_and_render_comments($row["id"]);
    echo "</div>";
    
  }

  function render_comments($row){
    require "authenticate.php";
    echo "  <div class=\"lista_comentarios\">";
    echo "    <div class=\"autor\">Autor:</div> <br>";
    echo "    <div class=\"usuario_nome\">".$row["name"]."</div>";
    echo "    <div class=\"comentarios\">".$row["content"]."</div>";
    echo "    <div class=\"deletar\">";
    if ($user_role == "admin"){
      echo "      <button class=\"myButton\" type=\"button\"><a href=\"delete_comment.php?id=".$row["id"]."\" onclick=\"return confirm('Tem certeza que deseja remover o comentario?')\" >Deletar</a></button>";
    }
    echo "    </div>";
    echo "  </div>";
  }

  function get_and_render_categories_list(){
    $matrix = get_categories();
    if($matrix){
      foreach($matrix as $row){
        echo "<a href=\"articles.php?id=".$row["id"]."\">".$row["name"]."</a><br><br>";
      }
    }
  }

  function get_categories(){
    $sql = "SELECT * FROM categories ORDER BY name;";
    $result = run_query($sql);
    $db_matrix = result_to_matrix($result);
    return $db_matrix;
  }
?>
