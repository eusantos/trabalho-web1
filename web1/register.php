<?php
require "db/db_utils.php";
require "authenticate.php";

$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["action_type"] == "sign_in") {
    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
      
      $conn = connect_db();

      $name = mysqli_real_escape_string($conn,$_POST["name"]);
      $email = mysqli_real_escape_string($conn,$_POST["email"]);
      $password = mysqli_real_escape_string($conn,$_POST["password"]);
      $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);
      
      disconnect_db($conn);

      if ($password == $confirm_password) {
        $password = md5($password);

        $sql = "INSERT INTO users
                (name, email, md5_password, role) VALUES
                ('$name', '$email', '$password', 'user');";

        $success = run_sql($sql);

      }
      else {
        $error_msg = "Senha não confere com a confirmação.";
        $error = true;
      }
    }
  } elseif ($_POST["action_type"] == "login"){
    if (isset($_POST["lemail"]) && isset($_POST["lpassword"])) {

      $conn = connect_db();
  
      $email = mysqli_real_escape_string($conn,$_POST["lemail"]);
      $password = mysqli_real_escape_string($conn,$_POST["lpassword"]);
      $password = md5($password);

      disconnect_db($conn);

      $sql = "SELECT id, name, email, md5_password, role FROM users
              WHERE email = '$email';";
  
      $result = run_query($sql);

      if($result){
        if (mysqli_num_rows($result) > 0) {
          $user = mysqli_fetch_assoc($result);
  
          if ($user["md5_password"] == $password) {
  
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["user_role"] = $user["role"];
  
            header("Location: " . dirname($_SERVER['SCRIPT_NAME']) . "/index.php");
            exit();
          }
          else {
            $error_msg = "Usuario e/ou senha incorreta!!";
            $error = true;
          }
        }
        else{
          $error_msg = "Usuario e/ou senha incorreta!";
          $error = true;
        }
      }
      else {
        $error = true;
      }
    }
  }
  else {
    $error_msg = "Por favor, preencha todos os dados.";
    $error = true;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inovação Tecnológica - Login/Sign in</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
  <?php if ($login): ?>
      <h3>Você já está logado!</h3>
    </body>
    </html>
    <?php exit(); ?>
  <?php endif; ?>

  <?php if ($error): ?>
    <h3 style="color:red;"><?php echo $error_msg; ?></h3>
  <?php endif; ?>

  <div class="login">
    <div class="card">
      <h1>Realize o login</h1>
      <form action="register.php" method="post">
        <input type="text" name="lemail" placeholder="Email" class="register_input" value="" required><br>
        <br>
        <input type="password" name="lpassword" placeholder="Senha" class="register_input" value="" required><br>

        <input type="hidden" name="action_type" class="register_input" value="login"><br>

        <input type="submit" name="submit" class="myButton" value="Entrar">
      </form>

      <?php if ($success): ?>
        <h3 style="color:lightgreen;">Usuário criado com sucesso!</h3>
        </body>
      </html>
      <?php die();?>
      <?php else: ?>
        <h1>Ou cadastre-se</h1>
      <?php endif; ?>

      <form action="register.php" method="post">
        <input type="text" name="name" placeholder="Nome" class="register_input" value="" required><br>
        <br>
        <input type="email" name="email" placeholder="Email" class="register_input" value="" required><br>
        <br>
        <input type="password" name="password" placeholder="Senha" class="register_input" value="" required><br>
        <br>
        <input type="password" name="confirm_password"placeholder="Confirmação de senha"  class="register_input" value="" required><br>

        <input type="hidden" name="action_type" class="register_input" value="sign_in"><br>

        <input type="submit" name="submit" class="myButton" value="Criar usuário">
      </form>
      <br>
        <a href="index.php">Voltar</a></li>
    </div>
  </div>
</body>
</html>
