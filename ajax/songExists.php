<?php

	session_start();
	require_once "../phpfun/connectDB.php";

	$title	= $_POST['title'];
	$artist = $_POST['artist'];
	$year  	= $_POST['year'];


	// Prepared statements
  $stmt=mysqli_stmt_init($conn);

  $sql = "SELECT id
      	FROM songs 
      	WHERE title = ?
      	AND artist = ?
      	AND year = ?
      	";

  if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt,'sss',$title,$artist,$year);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) > 0) {
      echo "songexists";

      mysqli_stmt_bind_result($stmt,$id);
      while(mysqli_stmt_fetch($stmt)) {
        $_SESSION['songid'] = $id;
      }
    }

    mysqli_stmt_close($stmt);
  }
?>