<?php
	
	session_start();
	require_once "../phpfun/connectDB.php";

	$songid = $_GET['id'];
	if(isset($_SESSION['userid'])){
		$userid = $_SESSION['userid'];
	} else {
		$userid = '';
		echo 'notloggedin';
	}

	if ($userid > '') {
		global $conn;

		$sql = "UPDATE picks 
	          	set deleted = 'Y'
	          	WHERE songid = $songid
	        	AND userid = $userid
	    ";
	        
	    if(mysqli_query($conn,$sql)) {
	      echo 'success';
	    }
	}
?>