<?php
  $success = false;

  function run_sql($query) {
    require('db_credentials.php');
  // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
     // Check connection
     if (!$conn) {
      die("Connection failed: $servername, $username, $password, $dbname " . mysqli_connect_error());
    }

    if (mysqli_query($conn, $query)) {
      $success = true;
      // echo "Comando executado com sucesso: $query";
      // echo "<br>";
    } else {
      $error_msg = "Falha ao executar o comando $query. - " . mysqli_error($conn);
      // echo $error_msg;
      // echo "<br>";
    }
  
    mysqli_close($conn);

    return $success;
  }

  function run_query($query) {
    require('db_credentials.php');
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
     // Check connection
     if (!$conn) {
      die("Connection failed: $servername, $username, $password, $dbname " . mysqli_connect_error());
    }

    $query_result = mysqli_query($conn, $query);
    
    mysqli_close($conn);

    return $query_result ;
  }
  
  
  function connect_db(){
    require('db_credentials.php');
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
  
    return($conn);
  }
  
  function disconnect_db($conn){
    mysqli_close($conn);
  }

  function result_to_matrix($result){
    $db_matrix = array();
    if($result){
      if (mysqli_num_rows($result) > 0) {
          $db_matrix = array();
          $i = 0;
          while ( $db_array = mysqli_fetch_assoc($result)){
              $db_matrix[$i] = $db_array;
              $i = $i + 1;
          }
      }
    }
    return $db_matrix;
  }

?>