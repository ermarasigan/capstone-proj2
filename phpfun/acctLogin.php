<?php
  
  $login_status = '';

  if(isset($_POST['login'])){

    $username = htmlspecialchars($_POST['username']);
    $password = sha1($_POST['password']);

    // Prepared statements
    $stmt=mysqli_stmt_init($conn);

    $sql = "SELECT id, username, password, role, birthday
        FROM users 
        WHERE username = ?
        AND password = ?
        ";

    if(mysqli_stmt_prepare($stmt,$sql)){
      mysqli_stmt_bind_param($stmt,'ss',$username,$password);
      mysqli_stmt_execute($stmt);

      mysqli_stmt_store_result($stmt);
      
      if(mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt,$id,$username,$password,$role,$birthday);
        while(mysqli_stmt_fetch($stmt)) {
          
          $_SESSION['userid'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['role'] = $role;

          header('location:index.php', true, 301);
        }
      } else {
        echo '<script type="text/javascript"> 
                var status="login_error";
                document.getElementById("#login_modal").showModal();
              </script>';
        $login_status = 'login_error';
      }

      mysqli_stmt_close($stmt);
    }
  }
?>