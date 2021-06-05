<?php
  require_once('../../../private/initialize.php');
  require_login_as_staff();
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
    <title> View Customers | Dashboard</title>
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
        <p class="header-paragraph">See below all the Approved Customers.</p>
      </div>
    </div>
    <!-- Header -->

    <!-- Content Area -->
    <div class="content-area">
      <div class="content-area-content container">
        <form  action="<?php echo url_for('/user/staff/dashboard.php'); ?>" method="post">
          <button class="btn btn-dark dashboard-button" type="submit">Dashboard</button>
        </form>
        <div class="row">
          <div class="col-11 mx-auto">
            <h1 class="content-area-heading text-center">Approved Customers</h1>
            <?php if(isset($_SESSION['Message'])) {
              echo "<h5 class='mb-5 text-center'>" .$_SESSION['Message']. "<h5>";
              unset($_SESSION['Message']);
            } ?>
            <?php if(mysqli_num_rows(get_approved_customers()) != 0) { ?>
              <table class="table table-striped table-bordered table-responsive-md text-center" style="margin-bottom: 10rem;">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">A/C No.</th>
                    <th scope="col">Balance</th>
                    <th scope="col">F. Name</th>
                    <th scope="col">L. Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Last Login</th>
                    <th scope="col">View</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $result = get_approved_customers();
                    $count = 1;
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                      <th scope="row"><?php echo $count; ?></th>
                      <td><?php echo $row['Acc_Num']; ?></td>
                      <td><?php echo get_account_balance($row['Acc_Num']); ?></td>
                      <td><?php echo $row['FirstName']; ?></td>
                      <td><?php echo $row['LastName']; ?></td>
                      <td><?php echo $row['Email']; ?></td>
                      <td><?php echo get_last_login($row['Email']); ?></td>
                      <td><form action="<?php echo url_for('user/staff/approved-customer-details.php'); ?>" method="post">
                            <input type="hidden" name="Acc_Num" value="<?php echo $row['Acc_Num']; ?>">
                            <button class="btn btn-primary">View</button>
                          </form>
                      </td>
                    </tr>
                  <?php $count++; } mysqli_free_result($result); ?>
                </tbody>
              </table>
            <?php } else { ?>
              <h4 class="text-center" style="margin-bottom: 10rem;">There are currently no Approved Accounts.</h3>
            <?php } ?>
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
