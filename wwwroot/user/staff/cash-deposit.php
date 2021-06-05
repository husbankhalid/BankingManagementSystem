<?php
  require_once('../../../private/initialize.php');
  require_login_as_staff();
?>
<?php
  if(is_post_request()) {
    if($_POST['FirstName'] != get_first_name('customer', $_POST['Email'])){
      $_SESSION['Message'] = "Invalid details entered, please try again.";
      redirect_to(url_for('/user/staff/cash-deposit.php#message'));
    }
    if($_POST['Acc_Num'] != get_account_number($_POST['Email'])) {
      $_SESSION['Message'] = "Invalid account number entered, please try again.";
      redirect_to(url_for('/user/staff/cash-deposit.php#message'));
    }
    $result = add_account_balance($_POST['Acc_Num'], intval($_POST['CreditAmount']), "Cash Deposit to Self");
    if($result) {
      $_SESSION['Message'] = "Cash deposited successfully.";
      redirect_to(url_for('/user/staff/dashboard.php#message'));
    } else {
      $_SESSION['Message'] = "Database Query Failed: " .mysqli_error($db);
      redirect_to(url_for('/user/staff/dashboard.php#message'));
    }
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
    <title>Cash Deposit | Dashboard</title>
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
            <a class="nav-link" href="<?php echo url_for('/user/staff/dashboard.php'); ?>">Dashboard</a>
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
        <p class="header-paragraph">Please fill the details below to deposit cash.</p>
      </div>
    </div>
    <!-- Header -->

    <!-- Content Area -->
    <div class="content-area">
      <div class="content-area-content container">
        <div class="mb-5">
          <form action="<?php echo url_for('/user/staff/dashboard.php'); ?>" method="post" style="display: inline-block;">
            <button class="btn btn-dark rectangleButton" type="submit">Dashboard</button>
          </form>
        </div>
        <div class="row">
          <div class="col-11 mx-auto">
            <h1 class="content-area-heading text-center" id="message">Cash Deposit</h1>
            <?php if(isset($_SESSION['Message'])) {
              echo "<p class='mb-5 text-center'>" .$_SESSION['Message']. "<p>";
              unset($_SESSION['Message']);
            } ?>
            <div class="row">
              <div class="col-md-4 mx-auto">
                <div class="card">
                  <div class="card-header text-center">
                    Cash Deposit
                  </div>
                  <div class="card-body">
                    <form action="<?php echo url_for('/user/staff/cash-deposit.php'); ?>" method="post">
                      <div class="form-group">
                        <label for="FirstName">First Name:</label>
                        <input class="form-control form-control-sm" type="text" name="FirstName" placeholder="First Name" id="FirstName" required>

                        <label for="Email">Email:</label>
                        <input type="email" class="form-control form-control-sm" id="Email" placeholder="Email Address" name="Email" required>

                        <label for="Acc_Num">A/C Number:</label>
                        <input class="form-control form-control-sm" type="tel" name="Acc_Num" placeholder="Account Number" id="Acc_Num" required>

                        <label for="CreditAmount">Amount:</label>
                        <input class="form-control form-control-sm" type="tel" name="CreditAmount" placeholder="Amount" id="CreditAmount" required>
                      </div>
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
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
