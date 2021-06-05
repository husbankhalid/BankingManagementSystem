<?php
  require_once('../../private/initialize.php');
  if(is_get_request()) {
    redirect_to(url_for('/user/logout.php'));
  }
?>
