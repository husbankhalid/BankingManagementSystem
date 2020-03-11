<?php require_once('../../private/initialize.php') ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Oswald|Merriweather|Roboto+Slab|Ubuntu&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo url_for('css/bootstrap.min.css'); ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo url_for('/css/mystyle.css'); ?>">
    <title> Submit | Banking Management System</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?php echo url_for('/index.php'); ?>" id="site-title">Banking Management System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('/index.php'); ?>">Home</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('/pages/open-account.php'); ?>">Open Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('/pages/about.php'); ?>">About</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar -->

    <?php
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

        $result = submit_account_opening_form(
          $FirstName, $LastName, $FatherName, $DOB, $Gender, $MobileNumber,
          $Email, $Password, $Address, $City, $District, $PIN, $State
        );
    ?>
      <?php if($result) {?>
          <!-- Header -->
          <div class="header">
            <div class="centeredXY">
              <h1 class="header-title text-center">Form Submitted Successfully</h1>
              <p class="header-paragraph">Please meet the bank staff for further process.</p>
              <p class="header-paragraph">Thank You!</p>
            </div>
          </div>
          <!-- Header -->
      <?php } else {
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }?>
    <?php } else {
      redirect_to(url_for('index.php'));
    }?>

    <!-- Footer area -->
    <!-- Load footer.php -->
    <?php require_once(PRIVATE_PATH . '/shared/footer.php'); ?>
    <!-- Footer area -->

    <!-- jQuery first, then Bootstrap JS -->
    <script type="text/javascript" src="<?php echo url_for('/js/jquery.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo url_for('/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Custom JS -->
    <script src="<?php echo url_for('/js/myscript.js'); ?>"></script>

  </body>
</html>
