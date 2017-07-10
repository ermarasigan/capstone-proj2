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

		$sql = "SELECT * FROM picks 
	            WHERE songid = $songid
	            AND userid = $userid
	            ";
	    $result = mysqli_query($conn,$sql);
	    if(mysqli_num_rows($result) > 0){
	    	$sql = "UPDATE `picks` 
		            set deleted = null
		          	WHERE songid = $songid
	            	AND userid = $userid
		    		";
		        
		    if(mysqli_query($conn,$sql)) {
		      echo 'success';
		    }
	    } else {
			$sql = "INSERT into `picks` 
		            (`songid`, `userid`)
		          	VALUES ($songid, $userid)
		    		";
		        
		    if(mysqli_query($conn,$sql)) {
		      echo 'success';
		    }
		}
	}
?>