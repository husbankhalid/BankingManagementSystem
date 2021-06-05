<?php
  function submit_account_opening_form(
    $FirstName, $LastName, $FatherName, $DOB, $Gender, $MobileNumber,
    $Email, $Password, $Address, $City, $District, $PIN, $State
  ) {
      global $db;
      $Query = "INSERT INTO customer_details (";
      $Query .= "FirstName, LastName, FatherName, DOB, Gender, MobileNumber, Email,";
      $Query .= "Password, Address, City, District, PIN, State) VALUES (";
      $Query .= "'" .db_escape($db, $FirstName). "', '" .db_escape($db, $LastName). "', '" .db_escape($db, $FatherName). "', '" .db_escape($db, $DOB). "', '" .db_escape($db, $Gender). "', '" .db_escape($db, $MobileNumber). "', '" .db_escape($db, $Email). "',";
      $Query .= "'" .$Password. "', '" .db_escape($db, $Address). "', '" .db_escape($db, $City). "', '" .db_escape($db, $District). "', '" .db_escape($db, $PIN). "', '" .db_escape($db, $State) . "')";

      $result = mysqli_query($db, $Query);
      return $result;
  }

  function get_login_password($AccountType, $LoginEmailID) {
    global $db;

    $Query = "SELECT LoginPassword FROM login_details WHERE ";
    $Query .= "AccountType = '" .db_escape($db, $AccountType). "' and ";
    $Query .= "LoginEmailID = '" .db_escape($db, $LoginEmailID). "'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    if(mysqli_num_rows($result_set) == 1) {
      $result = mysqli_fetch_assoc($result_set);
      $HashedPassword = $result['LoginPassword'];
      return $HashedPassword;
    } else {
      return false;
    }
  }

  function change_password($AccountType, $LoginEmailID, $ConfirmPassword) {
    global $db;
    if($AccountType == 'staff') {
      $Query1 = "UPDATE login_details ";
      $Query1 .= "SET LoginPassword = '" .password_hash($ConfirmPassword, PASSWORD_DEFAULT). "' ";
      $Query1 .= "WHERE AccountType = '" .db_escape($db, $AccountType). "' and LoginEmailID = '" .db_escape($db, $LoginEmailID). "'";

      $result1 = mysqli_query($db, $Query1);

      $Query2 = "UPDATE staff_details ";
      $Query2 .= "SET Password = '" .password_hash($ConfirmPassword, PASSWORD_DEFAULT). "' ";
      $Query2 .= "WHERE Email = '" .db_escape($db, $LoginEmailID). "'";

      $result2 = mysqli_query($db, $Query2);

      return ($result1 and $result2);
    }
    if($AccountType == 'customer') {
      $Query1 = "UPDATE login_details ";
      $Query1 .= "SET LoginPassword = '" .password_hash($ConfirmPassword, PASSWORD_DEFAULT). "' ";
      $Query1 .= "WHERE LoginEmailID = '" .db_escape($db, $LoginEmailID). "'";

      $result1 = mysqli_query($db, $Query1);

      $Query2 = "UPDATE customer_details ";
      $Query2 .= "SET Password = '" .password_hash($ConfirmPassword, PASSWORD_DEFAULT). "' ";
      $Query2 .= "WHERE Approved = 'Yes' and Email = '" .db_escape($db, $LoginEmailID). "'";

      $result2 = mysqli_query($db, $Query2);

      return ($result1 and $result2);
    }
  }

  function get_first_name($AccountType, $LoginEmailID) {
    global $db;

    $Query = "SELECT FirstName FROM login_details WHERE ";
    $Query .= "AccountType = '" .db_escape($db, $AccountType). "' and ";
    $Query .= "LoginEmailID = '" .db_escape($db, $LoginEmailID). "'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    $result = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);

    if(is_null($result)) {
      return $result;
    } else {
      $FirstName = $result['FirstName'];
      return $FirstName;
    }
  }

  function update_last_login($LoginEmailID) {
    global $db;

    $Query = "UPDATE login_details ";
    $Query .= "SET LastLogin = CURRENT_TIMESTAMP() ";
    $Query .= "WHERE LoginEmailID = '" .db_escape($db, $LoginEmailID). "'";

    $result = mysqli_query($db, $Query);

    if(!$result) {
      echo "Database Query Failed.";
    }
  }

  function get_unapproved_customers() {
    global $db;

    $Query = "SELECT * FROM customer_details WHERE ";
    $Query .= "Approved = 'No'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    return $result_set;
  }

  function get_approved_customers() {
    global $db;
    $Query = "SELECT * FROM customer_details WHERE ";
    $Query .= "Approved = 'Yes' ";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    return $result_set;
  }

  function get_customer_details($Acc_Num) {
    global $db;
    $Query = "SELECT * FROM customer_details WHERE ";
    $Query .= "Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    $result = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);

    return $result;
  }

  function approve_customer_account($Acc_Num, $FirstName, $Email, $Password) {
    global $db;

    $Query1 = "UPDATE customer_details ";
    $Query1 .= "SET Approved = 'Yes' ";
    $Query1 .= "WHERE Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result1 = mysqli_query($db, $Query1);

    $Query2 = "INSERT INTO login_details (AccountType, FirstName, LoginEmailID, LoginPassword) VALUES (";
    $Query2 .= "'customer', '" .db_escape($db, $FirstName). "', ";
    $Query2 .= "'" .db_escape($db, $Email). "', '" .db_escape($db, $Password). "') ";

    $result2 = mysqli_query($db, $Query2);

    $Query3 = "INSERT INTO accounts VALUES (";
    $Query3 .= "'" .db_escape($db, $Acc_Num). "', "  ."0)";

    $result3 = mysqli_query($db, $Query3);

    return ($result1 and $result2 and $result3);
  }

  function delete_customer_details($Acc_Num) {
    global $db;

    $Query = "DELETE FROM customer_details WHERE ";
    $Query .= "Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result = mysqli_query($db, $Query);

    return $result;
  }

  function disable_customer_details($Acc_Num) {
    global $db;

    $Query = "UPDATE customer_details ";
    $Query .= "SET Approved = 'Disabled' ";
    $Query .= "WHERE Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result = mysqli_query($db, $Query);

    return $result;
  }

  function delete_customer_login_details($LoginEmailID) {
    global $db;

    $Query = "DELETE FROM login_details WHERE ";
    $Query .= "LoginEmailID = '" .db_escape($db, $LoginEmailID). "'";

    $result = mysqli_query($db, $Query);

    return $result;
  }

  function delete_customer_account($Acc_Num) {
    global $db;

    $Query = "DELETE FROM accounts WHERE ";
    $Query .= "Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result = mysqli_query($db, $Query);

    return $result;
  }



  // Admin Queries
  function submit_staff_details(
    $FirstName, $LastName, $FatherName, $DOB, $Gender, $MobileNumber,
    $Email, $Password, $Address, $City, $District, $PIN, $State
  ) {
      global $db;
      $Query1 = "INSERT INTO staff_details (";
      $Query1 .= "FirstName, LastName, FatherName, DOB, Gender, MobileNumber, Email,";
      $Query1 .= "Password, Address, City, District, PIN, State) VALUES (";
      $Query1 .= "'" .db_escape($db, $FirstName). "', '" .db_escape($db, $LastName). "', '" .db_escape($db, $FatherName). "', '" .db_escape($db, $DOB). "', '" .db_escape($db, $Gender). "', '" .db_escape($db, $MobileNumber). "', '" .db_escape($db, $Email). "',";
      $Query1 .= "'" .$Password. "', '" .db_escape($db, $Address). "', '" .db_escape($db, $City). "', '" .db_escape($db, $District). "', '" .db_escape($db, $PIN). "', '" .db_escape($db, $State) . "')";


      $result1 = mysqli_query($db, $Query1);

      $Query2 = "INSERT INTO login_details (AccountType, FirstName, LoginEmailID, LoginPassword) VALUES (";
      $Query2 .= "'staff', '" .db_escape($db, $FirstName). "', ";
      $Query2 .= "'" .db_escape($db, $Email). "', '" .$Password. "') ";

      $result2 = mysqli_query($db, $Query2);

      return ($result1 and $result2);
  }

  function get_staff_accounts() {
    global $db;
    $Query = "SELECT * FROM staff_details";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    return $result_set;
  }

  function get_staff_details($Email) {
    global $db;
    $Query = "SELECT * FROM staff_details WHERE ";
    $Query .= "Email = '" .db_escape($db, $Email). "'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    $result = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);

    return $result;
  }

  function delete_staff_details($Email) {
    global $db;

    $Query1 = "DELETE FROM staff_details ";
    $Query1 .= "WHERE Email = '" .db_escape($db, $Email). "'";

    $result1 = mysqli_query($db, $Query1);

    $Query2 = "DELETE FROM login_details ";
    $Query2 .= "WHERE LoginEmailID = '" .db_escape($db, $Email). "'";

    $result2 = mysqli_query($db, $Query2);

    return ($result1 and $result2);
  }
  // End of Admin Queries

  // Cutomer Queries
  function get_account_number($Email) {
    global $db;

    $Query = "SELECT Acc_Num FROM customer_details WHERE ";
    $Query .= "Email = '" .db_escape($db, $Email). "' and ";
    $Query .= "Approved = 'Yes'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    $result = mysqli_fetch_assoc($result_set);
    $Acc_Num = $result['Acc_Num'];

    mysqli_free_result($result_set);

    return $Acc_Num;
  }

  function get_account_balance($Acc_Num) {
    global $db;

    $Query = "SELECT Balance FROM accounts WHERE ";
    $Query .= "Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    $result = mysqli_fetch_assoc($result_set);
    $Balance = intval($result['Balance']);

    mysqli_free_result($result_set);
    return $Balance;
  }

  function get_last_login($LoginEmailID) {
    global $db;

    $Query = "SELECT LastLogin FROM login_details WHERE ";
    $Query .= "LoginEmailID = '" .db_escape($db, $LoginEmailID). "'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    $result = mysqli_fetch_assoc($result_set);
    $LastLogin = $result['LastLogin'];

    mysqli_free_result($result_set);
    return $LastLogin;
  }

  function add_transaction_details($Acc_Num, $Credit, $Debit, $Balance, $Description) {
    global $db;

    $Query = "INSERT INTO transactions (Acc_Num, Credit, Debit, Balance, Description) VALUES (";
    $Query .= "'" .db_escape($db, $Acc_Num). "', '" .db_escape($db, $Credit). "', '" .db_escape($db, $Debit). "', '" .db_escape($db, $Balance). "', '" .db_escape($db, $Description). "')";

    $result = mysqli_query($db, $Query);

    return $result;
  }

  function add_account_balance($Acc_Num, $CreditAmount, $Description) {
    global $db;

    $Query = "UPDATE accounts ";
    $Query .= "SET Balance = '" .intval(get_account_balance(db_escape($db, $Acc_Num)) + db_escape($db, $CreditAmount)) ."' ";
    $Query .= "WHERE Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result1 = mysqli_query($db, $Query);

    if($result1) {
      $result2 = add_transaction_details($Acc_Num, $CreditAmount, NULL, get_account_balance($Acc_Num), $Description);
    }

    return ($result1 and $result2);
  }

  function remove_account_balance($Acc_Num, $DebitAmount, $Description) {
    global $db;

    $Query = "UPDATE accounts ";
    $Query .= "SET Balance = '" .intval(get_account_balance(db_escape($db, $Acc_Num)) - db_escape($db, $DebitAmount)) ."' ";
    $Query .= "WHERE Acc_Num = '" .$Acc_Num. "'";

    $result1 = mysqli_query($db, $Query);

    if($result1) {
      $result2 = add_transaction_details($Acc_Num, NULL, $DebitAmount, get_account_balance($Acc_Num), $Description);
    }

    return ($result1 and $result2);
  }

  function get_transaction_details($Acc_Num) {
    global $db;

    $Query = "SELECT * FROM transactions WHERE ";
    $Query .= "Acc_Num = '" .db_escape($db, $Acc_Num). "'";

    $result_set = mysqli_query($db, $Query);
    confirm_result_set($result_set);

    return $result_set;
  }

  // End of Cutomer Queries

?>
