<?php
	
	session_start();
	require_once "../phpfun/connectDB.php";

	$playid = $_POST['playid'];
	$playchords=[];

	// Get details from json
	$filename = "../json/songs/song" . $playid . "_chords.json";
	fopen($filename,'a');
	$string = file_get_contents($filename);

	if($string != null) {
		$playchords = json_decode($string, true);
	} 
	
	echo json_encode($playchords);
?>