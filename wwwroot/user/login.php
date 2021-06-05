<?php
  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $AccountType = $_POST['AccountType'];
    $LoginEmailID = $_POST['LoginEmailID'];
    $LoginPassword = $_POST['LoginPassword'];

    $HashedPassword = get_login_password($AccountType, $LoginEmailID);
    validate_login_details($AccountType, $LoginEmailID, $LoginPassword, $HashedPassword);

  } else {
      redirect_to(url_for('/index.php'));
  }
?>
