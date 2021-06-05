<?php
  require_once('../../../private/initialize.php');
  require_login_as_admin();
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
    <title> Unapproved Customer Details | Dashboard</title>
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
            <a class="nav-link" href="<?php echo url_for('/user/admin/dashboard.php'); ?>">Dashboard</a>
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
        <p class="header-paragraph">See below the details of Unapproved Customer.</p>
      </div>
    </div>
    <!-- Header -->

    <!-- Content Area -->
    <div class="content-area">
      <div class="content-area-content container">
        <div class="mb-5">
          <form action="<?php echo url_for('/user/admin/unapproved-customers.php'); ?>" method="post" style="display: inline-block;">
            <button class="btn btn-dark rectangleButton" type="submit">Back</button>
          </form>
          <form action="<?php echo url_for('/user/admin/dashboard.php'); ?>" method="post" style="display: inline-block;">
            <button class="btn btn-dark rectangleButton" type="submit">Dashboard</button>
          </form>
        </div>

        <div class="row">
          <div class="col-11 mx-auto">
            <h1 class="content-area-heading text-center">Unapproved Customer Details</h1>
            <?php
            $Acc_Num = $_POST['Acc_Num'];
            if($result = get_customer_details($Acc_Num)) { ?>
              <table class="table table-striped table-bordered table-responsive-md">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Data</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row"><?php echo "Submit Date"; ?></th>
                      <td><?php echo $result['SubmitDateTime']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Account Number"; ?></th>
                      <td><?php echo $result['Acc_Num']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "First Name"; ?></th>
                      <td><?php echo $result['FirstName']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Last Name"; ?></th>
                      <td><?php echo $result['LastName']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Father's Name"; ?></th>
                      <td><?php echo $result['FatherName']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Date of Birth"; ?></th>
                      <td><?php echo $result['DOB']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Gender"; ?></th>
                      <td><?php echo $result['Gender']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Mobile Number"; ?></th>
                      <td><?php echo $result['MobileNumber']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Email ID"; ?></th>
                      <td><?php echo $result['Email']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "Street Address"; ?></th>
                      <td><?php echo $result['Address']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "City"; ?></th>
                      <td><?php echo $result['City']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "District"; ?></th>
                      <td><?php echo $result['District']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "PIN"; ?></th>
                      <td><?php echo $result['PIN']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row"><?php echo "State"; ?></th>
                      <td><?php echo $result['State']; ?></td>
                    </tr>
                </tbody>
              </table>
            <?php } else { ?>
              <h4 class="text-center" style="margin-bottom: 10rem;">Unable to fetch customer details.</h3>
            <?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col-11 mx-auto mt-3">
            <form action="<?php echo url_for('/user/admin/approve-customer.php'); ?>" method="post" style="display: inline-block;">
              <input type="hidden" name="Acc_Num" value="<?php echo $result['Acc_Num']; ?>">
              <input type="hidden" name="Email" value="<?php echo $result['Email']; ?>">
              <input type="hidden" name="FirstName" value="<?php echo $result['FirstName']; ?>">
              <input type="hidden" name="Password" value="<?php echo $result['Password']; ?>">
              <button class="btn btn-secondary">Approve</button>
            </form>
            <form action="<?php echo url_for('/user/admin/remove-customer.php'); ?>" method="post" style="display: inline-block;">
              <input type="hidden" name="Acc_Num" value="<?php echo $result['Acc_Num']; ?>">
              <input type="hidden" name="Email" value="<?php echo $result['Email']; ?>">
              <input type="hidden" name="Approved" value="<?php echo $result['Approved']; ?>">
              <button class="btn btn-danger">Delete</button>
            </form>
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
