<?php
  function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
      $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
  }

  function u($string = "") {
    return urlencode($string);
  }

  function raw_u($string = "") {
    return rawurlencode($string);
  }

  function h($string = "") {
    return htmlspecialchars($string);
  }

  function error_404() {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    exit();
  }

  function error_500() {
    header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    exit();
  }

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

  function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  function log_in_user($AccountType, $LoginEmailID) {
    session_regenerate_id();
    $_SESSION['AccountType'] = $AccountType;
    $_SESSION['LoginEmailID'] = $LoginEmailID;
    $_SESSION['FirstName'] = get_first_name($AccountType, $LoginEmailID);
    $_SESSION['LoginStatus'] = 2;
  }

  function validate_login_details($AccountType, $LoginEmailID, $LoginPassword, $HashedPassword) {
    if($HashedPassword) {
      if(password_verify($LoginPassword, $HashedPassword)){
        log_in_user($AccountType, $LoginEmailID);
        redirect_to(url_for('/user/' .$AccountType. '/dashboard.php'));
      } else {
        $_SESSION['LoginStatus'] = 0;
        redirect_to(url_for('/index.php#login'));
      }
    } else {
      $_SESSION['LoginStatus'] = 0;
      redirect_to(url_for('/index.php#login'));
    }
  }



  function log_out_user() {
      if(isset($_SESSION['AccountType'])) {
        unset($_SESSION['AccountType']);
      }
      if(isset($_SESSION['LoginEmailID'])) {
        unset($_SESSION['LoginEmailID']);
      }
      if(isset($_SESSION['FirstName'])) {
        unset($_SESSION['FirstName']);
      }
      if(isset($_SESSION['LoginStatus'])) {
        unset($_SESSION['LoginStatus']);
      }
      redirect_to(url_for('/index.php'));
  }

  function is_logged_in_as_admin() {
    return $_SESSION['AccountType'] === 'admin';
  }

  function is_logged_in_as_staff() {
    return $_SESSION['AccountType'] == 'staff';
  }

  function is_logged_in_as_customer() {
    return $_SESSION['AccountType'] == 'customer';
  }

  function require_login_as_admin() {
    if(!is_logged_in_as_admin()) {
      redirect_to(url_for('/user/logout.php'));
    }
  }

  function require_login_as_staff() {
    if(!is_logged_in_as_staff()) {
      redirect_to(url_for('/user/logout.php'));
    }
  }

  function require_login_as_customer() {
    if(!is_logged_in_as_customer()) {
      redirect_to(url_for('/user/logout.php'));
    }
  }
?>
