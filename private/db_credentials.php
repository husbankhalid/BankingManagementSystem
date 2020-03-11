<?php
  // For localhost only
  define("DB_SERVER", "localhost");
  define("DB_USER", "husban");
  define("DB_PASS", "TaDa");
  define("DB_NAME", "bca");
  define("PORT", "3307");

  // // For Production Server
  // //below  will give the whole connectionstring in a single string
  // $conn = getenv("MYSQLCONNSTR_localdb");
  //
  // //Let's split it and decorate it in an array
  // $conarr2 = explode(";",$conn);
  // $conarr = array();
  // foreach($conarr2 as $key=>$value){
  //     $k = substr($value,0,strpos($value,'='));
  //     $conarr[$k] = substr($value,strpos($value,'=')+1);
  // }
  //
  // define("DB_SERVER", $conarr['Data Source']);
  // define("DB_USER", $conarr['User Id']);
  // define("DB_PASS", $conarr['Password']);
  // define("DB_NAME", $conarr['Database']);
?>
