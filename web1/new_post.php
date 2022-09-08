<?php
  require "controllers/new_posts_controller.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Inovação Tecnologica - Novo artigo</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div>
      <?php include 'menu.php';?>
      
      <section id="corpo">
      
      <?php if ($published ): ?>
              <p id="page-title">
                <?php
                  echo 'O artigo foi publicado!';
                ?>
              </p>
            <div>
            </section>
            <?php include 'rodape.php';?>
          </body>
        </html>
        <?php exit(); ?>
      <?php endif; ?>

      <?php if ($user_role != "admin"): ?>
              <p id="page-title">
                <?php
                  echo 'Parece que você não tem permissão para isso.';
                ?>
              </p>
            <div>
            </section>
            <?php include 'rodape.php';?>
          </body>
        </html>
        <?php exit(); ?>
      <?php endif; ?>

        <p id="page-title">
          <?php
            echo 'Escreva um novo artigo';
          ?>
        </p>

        <form action="new_post.php" method="post">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>"><br>
          <div>
            <div>
                <label>Titulo:*</label><br>
                <input type="text" placeholder="Nova tecnologia show de bola!" class="new_content_input" name="title" maxlength="100" required="required" aria-required="true" value="<?php echo $title; ?>">
            </div>
            <br>
            <div>
                <label>Link thumbnail*</label><br>
                <input type="text" placeholder="link da imagem" class="new_content_input" name=" thumb_link" maxlength="500" required="required" aria-required="true" value="<?php echo $thumb_link; ?>">
            </div>
            <br>
            <div>
                <label>Resumo*</label><br>
                <textarea type="textarea" placeholder="Resumo que será exibido nas listagens de artigos" class="new_content_input" name="resume" maxlength="300" maxrows="2" required="required" aria-required="true" value="" ><?php echo $resume; ?></textarea>
            </div>
            <br>
            <div>
                <label>Artigo*</label><br>
                <textarea type="textarea" placeholder="Texto do artigo. Aceita HTML." class="new_content_input" name="content" maxlength="5000" rows="30" required="required" aria-required="true" value=""><?php echo $content; ?></textarea>
            </div>
            <br>
            <div>
                <label>Categoria*</label><br>
                <input type="text" placeholder="Categoria que aparecerá nos filtros" class="new_content_input" name="category" maxlength="50" required="required" aria-required="true" value="<?php echo $category; ?>">
            </div>
            <br>
            <div>
                <br>
                <button type="submit" class="myButton">Publicar!</button>
            </div>
          </div>
        </form>
      </section>
      <?php include 'rodape.php';?>
    </div>
  </body>
</html>
