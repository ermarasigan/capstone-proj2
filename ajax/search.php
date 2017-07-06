<?php

	require_once "../phpfun/connectDB.php";

	$searchparm = $_POST['searchparm'];
	$array=[];

    // Prepared statements
    $stmt=mysqli_stmt_init($conn);

    $sql = "SELECT * FROM songs 
        WHERE match(`title`,`artist`) against (?)
        or `artist` like CONCAT(?,'%')
        or `title` like CONCAT(?,'%')
        ";

    if(mysqli_stmt_prepare($stmt,$sql)){

    	mysqli_stmt_bind_param($stmt,'sss',$searchparm,$searchparm,$searchparm);
    	mysqli_stmt_execute($stmt);

    	mysqli_stmt_store_result($stmt);
      
    	if(mysqli_stmt_num_rows($stmt) > 0) {
    		mysqli_stmt_bind_result($stmt,$id,$title,$artist,$year,$bpm);

    		while(mysqli_stmt_fetch($stmt)) {
    			array_push($array, $id);
    		}
    	}
    	mysqli_stmt_close($stmt);
    }
    echo json_encode($array);

    // Write to json file
    $filename = "../json/search.json";

    $fp = fopen($filename,'w');
    fwrite($fp, json_encode($array,JSON_PRETTY_PRINT));
    fclose($fp);
?>