<?php
  require('../db_credentials.php');

  // Create connection
  $conn = mysqli_connect($servername, $username, $password);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Create database
  $sql = "CREATE DATABASE $dbname";
  if (mysqli_query($conn, $sql)) {
    echo "Database  $dbname created successfully";
  } else {
    echo "Error creating  $dbname database: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>
