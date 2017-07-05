<?php

	// function additem() {

	// 	global $conn;

	// 	require "phpfun/connectdb.php";

		if(isset($_POST['additem'])){

			$name = addslashes(ucfirst($_POST['name']));
			$price = $_POST['price'];

			if ($name == '' || $name == null) {
				echo '<div class="alert alert-danger">';
                echo 'Item name is required';
                echo '</div>'; 
			} else if ($price == null) {
				echo '<div class="alert alert-danger">';
                echo 'Item price is required';
                echo '</div>'; 
			} 
			// else {
				// echo $name;
				// echo $price;
			if ($name != null && $price != null) {
				$sql = "insert into menu (date, name, price) 
						values (current_date, '$name','$price')";
				$result= mysqli_query($conn, $sql);

				if($result) {
					header('location: menu.php');
				}
			}
		}
		
		if(isset($_POST['cancel'])) {
			header('location: index.php');
		}
	// }
?>