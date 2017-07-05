<?php
	if (isset($_GET['id'])) {
		
		$id=$_GET['id'];

		// User confirmed deletion of item
		if(isset($_POST['yes'])){

			$sql = "Delete FROM menu
					where date = current_date
					and id = $id";

			$result=mysqli_query($conn, $sql);

			if($result) {
				header('location: menu.php');
			}
		}

		// User cancelled deletion of item
		if(isset($_POST['no'])){

			header('location: menu.php');
		}
	}
?>