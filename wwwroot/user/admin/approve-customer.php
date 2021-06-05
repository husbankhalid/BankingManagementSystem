<?php
  require_once('../../../private/initialize.php');
  require_login_as_admin();

  $Acc_Num = $_POST['Acc_Num'];
  $FirstName = $_POST['FirstName'];
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];

  $result = approve_customer_account($Acc_Num, $FirstName, $Email, $Password);

  if($result) {
    $_SESSION['Message'] = "Customer account approved successfully.";
    redirect_to(url_for('/user/admin/unapproved-customers.php#message'));
  } else {
    $_SESSION['Message'] = "Database Query Failed:" .mysqli_error($db);
    redirect_to(url_for('/user/admin/unapproved-customers.php#message'));
  }
?>
