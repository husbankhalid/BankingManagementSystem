<?php
  require_once('../../../private/initialize.php');
  require_login_as_staff();
  if($_SESSION['LoginStatus'] == 2) {
    update_last_login($_SESSION['LoginEmailID']);
    $_SESSION['LoginStatus'] = 1;
  }
?>

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
    <title> <?php echo $_SESSION['FirstName']; ?> | Dashboard</title>
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
          <li class="nav-item active">
            <a class="nav-link active" href="#">Hello, <?php echo $_SESSION['FirstName']; ?> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url_for('/user/logout.php'); ?>">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar -->


    <!-- Header -->
    <div class="header">
      <div class="centeredXY">
        <h1 class="header-title text-center">Hello, <?php echo $_SESSION['FirstName']; ?></h1>
        <p class="header-paragraph">You are successfully logged in as Staff!</p>
      </div>
    </div>
    <!-- Header -->

    <!-- Content Area -->
    <div class="content-area">
      <div class="content-area-content container">
        <div class="row">
          <div class="col-10 mx-auto">
            <h1 class="content-area-heading text-center" id="message">Dashboard</h1>
            <?php if(isset($_SESSION['Message'])) {
              echo "<p class='mb-5 text-center'>" .$_SESSION['Message']. "<p>";
              unset($_SESSION['Message']);
            } ?>
            <div class="row">
              <div class="col-md-6">
                <div class="card text-center">
                  <h5 class="card-header">Approved Customers</h5>
                  <div class="card-body">
                    <p class="card-text">View details of all existing customers.</p>
                    <a class="btn btn-primary" href="<?php echo url_for('/user/staff/approved-customers.php'); ?>">View</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card text-center">
                  <h5 class="card-header">Unapproved Customers</h5>
                  <div class="card-body">
                    <p class="card-text">Approve or delete customer accounts.</p>
                    <a class="btn btn-primary" href="<?php echo url_for('/user/staff/unapproved-customers.php'); ?>">View</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="card text-center">
                  <h5 class="card-header">Cash Deposit</h5>
                  <div class="card-body">
                    <p class="card-text">Deposit cash to customer's account.</p>
                    <a class="btn btn-primary" href="<?php echo url_for('/user/staff/cash-deposit.php'); ?>">View</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card text-center">
                  <h5 class="card-header">Cash Withdrawal</h5>
                  <div class="card-body">
                    <p class="card-text">Withdraw cash from customer's account.</p>
                    <a class="btn btn-primary" href="<?php echo url_for('/user/staff/cash-withdrawal.php'); ?>">View</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mx-auto">
                <div class="card text-center">
                  <h5 class="card-header">Change Password</h5>
                  <div class="card-body">
                    <p class="card-text">Change your Login Password.</p>
                    <a class="btn btn-primary" href="<?php echo url_for('/user/staff/change-password.php'); ?>">View</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content Area -->

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
