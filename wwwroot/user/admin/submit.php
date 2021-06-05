<?php
  require_once('../../../private/initialize.php');
  require_login_as_admin();
  if(is_post_request()) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $FatherName = $_POST['FatherName'];
    $DOB = $_POST['DOB'];
    $Gender = $_POST['Gender'];
    $MobileNumber = $_POST['MobileNumber'];
    $Email = $_POST['Email'];
    // $Password = $_POST['Password'];
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $Address = $_POST['Address'];
    $City = $_POST['City'];
    $District = $_POST['District'];
    $PIN = $_POST['PIN'];
    $State = $_POST['State'];

    $result = submit_staff_details(
      $FirstName, $LastName, $FatherName, $DOB, $Gender, $MobileNumber,
      $Email, $Password, $Address, $City, $District, $PIN, $State
    );

    if($result) {
      $_SESSION['Message'] = "Staff added successfully.";
      redirect_to(url_for('/user/admin/dashboard.php'));
    } else {
      echo "Database Query Failed: " .mysqli_error($db);
    }
  }
?>
