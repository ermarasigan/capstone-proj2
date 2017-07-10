<?php

	session_start();
	require_once "../phpfun/connectDB.php";

	$chords	= $_POST['chords'];
	$lyrics	= $_POST['lyrics'];
	$bpm   	= $_POST['bpm'];
	$title	= $_POST['title'];
	$artist = $_POST['artist'];
	$year  	= $_POST['year'];
	$insertid = '';


	// Prepared statements
    $stmt=mysqli_stmt_init($conn);

    $sql = "INSERT INTO songs 
                    (title, artist, year, bpm)
            VALUES (?,?,?,?)";

    if(mysqli_stmt_prepare($stmt,$sql)){
    	mysqli_stmt_bind_param($stmt,'sssi',$title, $artist, $year, $bpm);
    	mysqli_stmt_execute($stmt);

    	if(mysqli_stmt_affected_rows($stmt)>0) {
    		echo "success";
    		$insertid = mysqli_insert_id($conn);
    	} else {
    		echo "Insert failed";
    	}

    	mysqli_stmt_close($stmt);
    }

    if($insertid>''){
    	// Write to json file (Chords)
    	$filename = "../json/songs/song" . $insertid . "_chords.json";

	    $fp = fopen($filename,'w');
	    fwrite($fp, json_encode($chords,JSON_PRETTY_PRINT));
	    fclose($fp);

	    // Write to json file (Lyrics)
    	$filename = "../json/songs/song" . $insertid . "_lyrics.json";

	    $fp = fopen($filename,'w');
	    fwrite($fp, json_encode($lyrics,JSON_PRETTY_PRINT));
	    fclose($fp);
    }
?>