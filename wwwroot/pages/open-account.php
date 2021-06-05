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
          <li class="nav-item active">
            <a class="nav-link active" href="<?php echo url_for('/pages/open-account.php'); ?>">Open Account<span class="sr-only">(current)</a>
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
    <!-- Open Account area -->
    <div class="form-area">
      <div class="form-area-content container">
        <h1 class="content-area-heading text-center">Open Account</h1>
        <div class="row">
          <form method="post" action="<?php echo url_for('/pages/submit.php'); ?>"class="mx-auto col-10">
            <div class="form-row ">
              <div class="form-group col-md-4">
                <label for="FirstName">First Name</label>
                <input type="text" class="form-control form-control-sm" placeholder="First name" id="FirstName" name = "FirstName" minlength = "2" maxlength="20" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" required>
              </div>
              <div class="form-group col-md-4">
                <label for="LastName">Last Name</label>
                <input type="text" class="form-control form-control-sm" placeholder="Last name" id="LastName" name = "LastName" minlength = "2" maxlength="20" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" required>
              </div>
              <div class="form-group col-md-4">
                <label for="FatherName">Father's Name</label>
                <input type="text" class="form-control form-control-sm" placeholder="Father's name" id="FatherName" name = "FatherName" minlength = "2" maxlength="40" pattern="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" required>
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-4">
                <label for="DOB">Date of Birth</label>
                <input type="date" class="form-control form-control-sm" id="DOB" name="DOB" required>
              </div>
              <div class="form-group col-md-4">
                <label for="Gender">Gender</label>
                <select id="Gender" class="form-control form-control-sm" name="Gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Transgender">Transgender</option>
                  <option value="Others">Others</option>
                  <option value="Select" selected disabled>Select</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="MobileNumber">Mobile Number</label>
                <input type="tel" class="form-control form-control-sm" id="MobileNumber" name="MobileNumber" placeholder="Mobile Number" required minlength = "10" maxlength="10" required>
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-4">
                <label for="Email">Email</label>
                <input type="email" class="form-control form-control-sm" id="Email" placeholder="Email Address" name="Email" minlength = "3" maxlength="20" required>
              </div>
              <div class="form-group col-md-4">
                <label for="Password">Password</label>
                <input type="password" class="form-control form-control-sm" id="Password" placeholder="Password" name="Password" minlength = "4" maxlength="15" required>
              </div>
              <div class="form-group col-md-4">
                <label for="Address">Address</label>
                <input type="text" class="form-control form-control-sm" id="Address" placeholder="Street Address" name="Address" minlength = "2" maxlength="40" required>
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md-3">
                <label for="City">City</label>
                <input type="text" class="form-control form-control-sm" id="City" placeholder="City" name="City" minlength = "2" maxlength="20" required>
              </div>
              <div class="form-group col-md-3">
                <label for="District">District</label>
                <input type="text" class="form-control form-control-sm" id="District" placeholder="District" name="District" minlength = "2" maxlength="20" required>
              </div>
              <div class="form-group col-md-3">
                <label for="PIN">PIN Code</label>
                <input type="tel" class="form-control form-control-sm" id="PIN" placeholder="PIN" name="PIN" minlength = "6" maxlength="6" required>
              </div>
              <div class="form-group col-md-3">
                <label for="State">State</label>
                <select id="State" class="form-control form-control-sm" name="State" required>
                  <option value="Andhra Pradesh">Andhra Pradesh</option>
                  <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                  <option value="Assam">Assam</option>
                  <option value="Bihar">Bihar</option>
                  <option value="Chandigarh">Chandigarh</option>
                  <option value="Chhattisgarh">Chhattisgarh</option>
                  <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                  <option value="Daman and Diu">Daman and Diu</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Lakshadweep">Lakshadweep</option>
                  <option value="Puducherry">Puducherry</option>
                  <option value="Goa">Goa</option>
                  <option value="Gujarat">Gujarat</option>
                  <option value="Haryana">Haryana</option>
                  <option value="Himachal Pradesh">Himachal Pradesh</option>
                  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                  <option value="Jharkhand">Jharkhand</option>
                  <option value="Karnataka">Karnataka</option>
                  <option value="Kerala">Kerala</option>
                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                  <option value="Maharashtra">Maharashtra</option>
                  <option value="Manipur">Manipur</option>
                  <option value="Meghalaya">Meghalaya</option>
                  <option value="Mizoram">Mizoram</option>
                  <option value="Nagaland">Nagaland</option>
                  <option value="Odisha">Odisha</option>
                  <option value="Punjab">Punjab</option>
                  <option value="Rajasthan">Rajasthan</option>
                  <option value="Sikkim">Sikkim</option>
                  <option value="Tamil Nadu">Tamil Nadu</option>
                  <option value="Telangana">Telangana</option>
                  <option value="Tripura">Tripura</option>
                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                  <option value="Uttarakhand">Uttarakhand</option>
                  <option value="West Bengal">West Bengal</option>
                  <option value="Select" selected disabled>Select</option>
                </select>
              </div>
            </div>
            <div class="form-group ">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms" required>
                <label class="form-check-label" for="terms">
                  Agree Terms & Conditions
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-dark rectangleButton">Submit</button>
            <button type="reset" class="btn btn-dark rectangleButton">Reset</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Open Account area -->
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
