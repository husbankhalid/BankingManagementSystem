<?php
  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $AccountType = $_POST['AccountType'];
    $LoginEmailID = $_POST['LoginEmailID'];
    $LoginPassword = $_POST['LoginPassword'];

    // Experiment
    $HashedPassword = get_login_password($AccountType, $LoginEmailID);
    validate_login_details($AccountType, $LoginEmailID, $LoginPassword, $HashedPassword);
    // End of Experiment

    // $result = validate_login_details($AccountType, $LoginEmailID, $LoginPassword);

    // if($result == 1) {
    //   log_in_user($AccountType, $LoginEmailID);
    //   redirect_to(url_for('/user/' .$AccountType. '/dashboard.php'));
    // } else {
    //   $_SESSION['LoginStatus'] = 0;
    //   redirect_to(url_for('/index.php#login'));
    // }

  } else {
      redirect_to(url_for('/index.php'));
  }
?>
