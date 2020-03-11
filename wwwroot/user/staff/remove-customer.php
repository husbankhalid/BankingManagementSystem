<?php
  require_once('../../../private/initialize.php');
  require_login_as_staff();
  $Acc_Num = $_POST['Acc_Num'];
  $Email = $_POST['Email'];
  $Approved = $_POST['Approved'];

  if($Approved == 'Yes') {
    $result1 = disable_customer_details($Acc_Num);
    $result2 = delete_customer_login_details($Email);
    $result3 = delete_customer_account($Acc_Num);

    if($result1 and $result2 and $result3) {
      $_SESSION['Message'] = "Customer account closed successfully.";
      redirect_to(url_for('/user/staff/approved-customers.php#message'));
    } else {
      $_SESSION['Message'] = "Database Query Failed: " .mysqli_error($db);
      redirect_to(url_for('/user/staff/approved-customers.php#message'));
    }
  } else {
    $result1 = delete_customer_details($Acc_Num);
    if($result1){
      $_SESSION['Message'] = "Customer details deleted successfully.";
      redirect_to(url_for('/user/staff/unapproved-customers.php#message'));
    } else {
      $_SESSION['Message'] = "Database Query Failed: " .mysqli_error($db);
      redirect_to(url_for('/user/staff/unapproved-customers.php#message'));
    }
  }
?>
