<?php

	$host='localhost';
	$username='root';
	$password='';
	$database='capstone';

	// $host='198.91.81.8';
	// $username='emmanlal_admin';
	// $password='master';
	// $database='emmanlal_exer';

	// $company='TUITT';

	$conn = mysqli_connect($host,$username,$password,$database);

	if($conn) {
		// echo 'Connected successfully!';
	} else {
		echo 'Connected unsuccessfully!';
	}



?>