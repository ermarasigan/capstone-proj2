<?php

  $update_status = '';

	if(isset($_POST['update'])){

    $username = $_SESSION['username'];
    $oldpswd = sha1($_POST['oldpswd']);
    
    // Call function to check if password is valid
    if (check_pswd($username,$oldpswd)) {

      // Call function to update users table
      $newpswd1 = $_POST['newpswd1'];
      $newpswd2 = $_POST['newpswd2'];
      updt_acct($username,$newpswd1,$newpswd2);

    } else {
      $update_status = 'pswd_invalid';
    }

    echo '<script type="text/javascript"> 
              var update_status="update_msg";
              var delete_status="";
              document.getElementById("#update_modal").showModal();
            </script>';
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


  function updt_acct($username,$newpswd1,$newpswd2) {
    
    global $conn;
    global $update_status;

    if ($newpswd1 == '') {
      $update_status = 'pswd_blank';
      return;
    }

    if (strlen($newpswd1) < 4) {
      $update_status = 'pswd_short';
      return;
    }

    if ($newpswd1 != $newpswd2) {
      $update_status = 'pswd_mismatch';
      return;
    }

    $newpswd1 = sha1($newpswd1);

    $sql = "UPDATE users 
            SET password = '$newpswd1'
          WHERE username = '$username'
    ";
        
    if(mysqli_query($conn,$sql)) {
      $update_status = 'update_success';
    }
  }

?>