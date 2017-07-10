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

	$sql = "SELECT title, artist, year, bpm FROM songs 
      WHERE id = '$songid'
      ";

    $result = mysqli_query($conn,$sql);

  	if(mysqli_num_rows($result) > 0) {
    	while($row = mysqli_fetch_assoc($result)) {
      		extract($row);
      		$_SESSION['playtitle']= $title;
      		$_SESSION['playartist']= $artist;
      		$_SESSION['playyear']= $year;
      		$_SESSION['playbpm']= $bpm;
    	}
    }
?>