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
    <title>Open Account | Banking Management System</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../index.php" id="site-title">Banking Management System</a>
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
          <li class="nav-item active">
            <a class="nav-link active" href="<?php echo url_for('/pages/about.php'); ?>">About<span class="sr-only">(current)</a>
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
