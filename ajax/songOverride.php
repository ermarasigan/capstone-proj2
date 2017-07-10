<?php

	session_start();
	require_once "../phpfun/connectDB.php";

	$chords	= $_POST['chords'];
	$lyrics	= $_POST['lyrics'];
	$bpm   	= $_POST['bpm'];
	$songid = $_SESSION['songid'];


	// Prepared statements
    $stmt=mysqli_stmt_init($conn);

    $sql = "UPDATE songs 
            SET bpm = ?
            WHERE id = ?";

    if(mysqli_stmt_prepare($stmt,$sql)){
    	mysqli_stmt_bind_param($stmt,'si',$bpm, $songid);
    	mysqli_stmt_execute($stmt);

    	if(mysqli_stmt_affected_rows($stmt)>0) {
    		echo "success";

    		// Write to json file (Chords)
	    	$filename = "../json/songs/song" . $songid . "_chords.json";

		    $fp = fopen($filename,'w');
		    fwrite($fp, json_encode($chords,JSON_PRETTY_PRINT));
		    fclose($fp);

		    // Write to json file (Lyrics)
	    	$filename = "../json/songs/song" . $songid . "_lyrics.json";

		    $fp = fopen($filename,'w');
		    fwrite($fp, json_encode($lyrics,JSON_PRETTY_PRINT));
		    fclose($fp);

    	} else {
    		echo "Insert failed";
    	}

    	mysqli_stmt_close($stmt);
    }
?>