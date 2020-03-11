<?php
  require_once('../../../private/initialize.php');
  require_login_as_staff();
?>

<?php
  if(is_post_request()) {
    $HashedPassword = get_login_password($_SESSION['AccountType'], $_SESSION['LoginEmailID']);
    $OldPassword = $_POST['OldPassword'];
    $NewPassword = $_POST['NewPassword'];
    $ConfirmPassword = $_POST['ConfirmPassword'];

    if(password_verify($OldPassword, $HashedPassword)) {
      if($NewPassword == $ConfirmPassword) {
        $result = change_password($_SESSION['AccountType'], $_SESSION['LoginEmailID'], $ConfirmPassword);
        if($result) {
          $_SESSION['Message'] = "Password changed successfully.";
          redirect_to(url_for('/user/staff/dashboard.php#message'));
        } else {
          echo "Database Query Failed: " .mysqli_error($db);
        }
      } else {
        $_SESSION['Message'] = "Confirm password did not mathched, please try again.";
        redirect_to(url_for('/user/staff/change-password.php#message'));
      }
    } else {
      $_SESSION['Message'] = "Incorrect old password, please try again.";
      redirect_to(url_for('/user/staff/change-password.php#message'));
    }
  }
?>

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
    <title>Change Password | Dashboard</title>
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
        <p class="header-paragraph">Change your password below.</p>
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
            <h1 class="content-area-heading text-center" id="message">Change Password</h1>
            <?php if(isset($_SESSION['Message'])) {
              echo "<p class='mb-5 text-center'>" .$_SESSION['Message']. "<p>";
              unset($_SESSION['Message']);
            } ?>
            <div class="row">
              <div class="col-md-4 mx-auto">
                <div class="card">
                  <div class="card-header text-center">
                    Change Password
                  </div>
                  <div class="card-body">
                    <form action="<?php echo url_for('/user/staff/change-password.php'); ?>" method="post">
                      <div class="form-group">
                        <label for="OldPassword">Old Password:</label>
                        <input class="form-control form-control-sm" type="password" name="OldPassword" id="OldPassword" placeholder="Old Password">

                        <label for="NewPassword">New Password:</label>
                        <input class="form-control form-control-sm" type="password" name="NewPassword" id="NewPassword" placeholder="New Password">

                        <label for="ConfirmPassword">Confirm Password:</label>
                        <input class="form-control form-control-sm" type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password">
                        <input type="hidden" name="Attempt" value="1">
                      </div>
                      <button class="btn btn-primary" type="submit">Change</button>
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
