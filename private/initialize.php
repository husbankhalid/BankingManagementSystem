<?php
  ob_start();
  session_start();

  // For changing default time zone of PHP
  date_default_timezone_set('Asia/Kolkata');

  // Assign file paths to PHP constants
  // __FILE__ returns the current path to this file
  // dirname() returns the path to the parent directory
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/wwwroot');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  // For localhost only
  // Can dynamically find everything in URL up to "/wwwroot"
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/wwwroot') + 8;
  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  // // For production server only
  // define("WWW_ROOT", '');


  require_once('functions.php');
  require_once('database.php');
  require_once('query_functions.php');

  $db = db_connect();
?>
