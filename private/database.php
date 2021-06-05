<?php
  require_once('db_credentials.php');

  // Create a database connection

  // Remove PORT for Production Server
  function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME, PORT);
    // $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
  }

  // Close database connection
  function db_disconnect($connection) {
    if(isset($connection)) {
      mysqli_close($connection);
    }
  }

  // Test if connection succeeded
  function confirm_db_connect() {
    if(mysqli_connect_errno()) {
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  // Test if query succeeded
  function confirm_result_set($result_set) {
    global $db;

    if (!$result_set) {
      echo "Database Query Failed: " .mysqli_error($db);
    	exit();
    }
  }

  function db_escape($db, $string) {
    return mysqli_real_escape_string($db, $string);
  }

?>
