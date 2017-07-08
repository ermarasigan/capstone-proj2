<?php

  session_start();
  require_once "../phpfun/connectDB.php";

  $username = $_SESSION['username'];
  $delpswd = sha1($_POST['delpswd']);

  // Call function to check if password is valid
  if (check_pswd($username,$delpswd)) {

    // Call function to update users table
    delete_acct($username,$delpswd);
    
  } else {

    echo "invalid";
  }


  function delete_acct($username,$password) {
    
    global $conn;

    $sql = "DELETE FROM users 
      WHERE username = '$username'
        AND password = '$password'
        ";

    $result = mysqli_query($conn,$sql);
    if($result) {
      session_unset();
      session_destroy();
      echo "success";
    }
  }

  function check_pswd($username,$password){
    
    global $conn;

    $sql = "SELECT * FROM users 
      WHERE username = '$username'
        AND password = '$password'
        ";

    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0) {
      return true;
    }
  }
?>