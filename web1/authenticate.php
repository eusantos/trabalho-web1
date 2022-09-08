<?php
  session_start();

  if (isset($_SESSION["user_id"]) && isset($_SESSION["user_name"]) && isset($_SESSION["user_email"]) && isset($_SESSION["user_role"])) {
    $login = true;
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
    $user_email = $_SESSION["user_email"];
    $user_role = $_SESSION["user_role"];
  }
  else{
    $login = false;
  }

?>
