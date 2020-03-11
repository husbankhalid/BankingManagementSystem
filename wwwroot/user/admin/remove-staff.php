<?php
  require_once('../../../private/initialize.php');
  require_login_as_admin();

  $Email = $_POST['Email'];
  $result = delete_staff_details($Email);

  if($result) {
    $_SESSION['Message'] = "Staff account deleted successfully.";
    redirect_to(url_for('/user/admin/dashboard.php'));
  } else {
    echo "Database Query Failed: " .mysqli_error($db);
  }
?>
