<?php
	
	session_start();
	require_once "../phpfun/connectDB.php";

	$playid = $_POST['playid'];
	$playlyrics=[];

	// Get details from json
	$filename = "../json/songs/song" . $playid . "_lyrics.json";
	fopen($filename,'a');
	$string = file_get_contents($filename);

	if($string != null) {
		$playlyrics = json_decode($string, true);
	} 
	
	echo json_encode($playlyrics);
?>