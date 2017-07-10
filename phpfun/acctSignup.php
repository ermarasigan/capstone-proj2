<?php

  $output = '';
  $signup_status = '';
  $signup_return = 
    '<script type="text/javascript"> 
      var status="signup_msg";
      document.getElementById("#login_modal").showModal();
    </script>';

  if(isset($_POST['signup'])){

    add_acct();

    if ($output > '') {
      if ($signup_status != 'signup_success') {
        $signup_status = 'signup_error';
      }
      echo $signup_return;
    }
  }

  function add_acct(){
    global $conn;
    global $output;
    global $signup_status;

    $reguser = $_POST['reguser'];
    $regpswd1 = $_POST['regpswd1'];
    $regpswd2 = $_POST['regpswd2'];
    $regemail = $_POST['regemail'];
    $regbirth = $_POST['regbirth'];


    // Check if supplied username is blank
    if ($reguser == ''){
      $output .= "Username is required";
      return $output;
    }

    // Check if account is already existing
    if (exists($reguser)){
      $output .= "Account already exists";
      return $output;
    }

    // Check if supplied password is blank
    if ($regpswd1 == ''){
      $output .= "Password is required";
      return $output;
    }

    // Check if supplied password is secure
    if (strlen($regpswd1) < 4) {
      $output .= "Passwords should have at least 4 chars";
      return $output;
    }

    // Check if supplied passwords are same
    if ($regpswd1!=$regpswd2) {
      $output .= "Passwords should be the same";
      return $output;
    }

    // Check if supplied email is blank
    if ($regemail == ''){
      $output .= "Email is required";
      return $output;
    }

    // Check if supplied email is valid
    if (!filter_var($regemail, FILTER_VALIDATE_EMAIL)) {
      $output .= "Invalid email format";
      return $output;
    }

    // Check if supplied birthdate is blank
    if ($regbirth == ''){
      $output .= "Birthdate is required";
      return $output;
    }

    // Must be at least 5 years old
    $birthdate = strtotime($regbirth);
    $minimum = strtotime('+5 years', $birthdate);
    if(time() < $minimum)  {
      $output .= "Must be at least 5 years old";
      return $output;
    }

    // Encrypt password
    $regpswd1 = sha1($regpswd1);

    // Prepared statements
    $stmt=mysqli_stmt_init($conn);
    $role='regular';

    $sql = "INSERT INTO users 
                    (username, password, role)
            VALUES (?,?,?)";

    if(mysqli_stmt_prepare($stmt,$sql)){
      mysqli_stmt_bind_param($stmt,'sss',$reguser,$regpswd1,$role);
      mysqli_stmt_execute($stmt);

      if(mysqli_stmt_affected_rows($stmt)>0) {
        $output .= "Account successfully created ";
        $signup_status = "signup_success";
        return $output;
      }

      mysqli_stmt_close($stmt);
    }
  }

  function exists($username){

    global $conn;

    // Prepared statements
    $stmt=mysqli_stmt_init($conn);

    $sql = "SELECT * FROM users 
      WHERE username = ?
        ";

    if(mysqli_stmt_prepare($stmt,$sql)){
      mysqli_stmt_bind_param($stmt,'s',$username);
      mysqli_stmt_execute($stmt);

      mysqli_stmt_store_result($stmt);
      
      if(mysqli_stmt_num_rows($stmt) > 0) {
        return true;
      }

      mysqli_stmt_close($stmt);
    }
  }
?>