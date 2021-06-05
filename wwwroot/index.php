<?php require_once('../private/initialize.php') ?>

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
    <title>Banking Management System</title>
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
            <a class="nav-link active" href="<?php echo url_for('/index.php'); ?>">Home <span class="sr-only">(current)</span></a>
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


      <!-- Header -->
      <div class="header">
        <div class="centeredXY">
          <h1 class="header-title text-center">Banking Management System</h1>
          <p class="header-paragraph">Welcome to Banking Management System!</p>
        </div>
      </div>
      <!-- Header -->



    <!-- Content area -->
    <!-- Login area -->
    <div class="form-area">
      <div class="form-area-content container">
        <div class="row">
          <div class="center-div-xs col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3">
            <h1 class="form-area-heading" id="login">Login</h1>
            <?php if(isset($_SESSION['LoginStatus']) and $_SESSION['LoginStatus'] === 0) {
              echo "<p style='font-size: 14px;'>Login unsuccessful, please try again!</p>";
            } ?>
            <form action = <?php echo url_for('/user/login.php'); ?> method = "post">
              <fieldset>
                <label for="AccountType">Account Type:</label><br>
                <select name="AccountType" class="form-control-sm" id="AccountType" required>
                  <option value="admin">Admin</option>
                  <option value="staff">Staff</option>
                  <option value="customer" selected>Customer</option>
                </select>
              </fieldset>

              <div class="form-group">
                <label for="LoginEmailID">Email ID</label>
                <input class="form-control form-control-sm login" type="email" name="LoginEmailID" id="LoginEmailID" placeholder="Enter your Email ID" minlength="3" maxlength="50" required>
              </div>

              <div class="form-group">
                <label for="LoginPassword">Password</label>
                <input class="form-control form-control-sm login" type="password" name="LoginPassword" id="LoginPassword" placeholder="Enter your Password"
                minlength="4" maxlength="20" required>
              </div>

              <button type="submit" class="btn btn-dark rectangleButton">Login</button>
              <button type="reset" class="btn btn-dark rectangleButton">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Login area -->
    <!-- Content area -->

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
<?php
  if(isset($_SESSION['LoginStatus'])) {
    unset($_SESSION['LoginStatus']);
  }
?>
