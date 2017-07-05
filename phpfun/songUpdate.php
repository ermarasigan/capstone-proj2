<?php
	if (isset($_GET['id'])) {
		
		$id=$_GET['id'];

		// User confirmed deletion of item
		if(isset($_POST['updyes'])){

			$sql = "SELECT name, price FROM menu
					where id = $id";

			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				extract($row);
			}

			$updname=ucfirst($_POST['updname']);
			$updprice=$_POST['updprice'];

			// echo $updname;
			// echo $updprice;
			// echo $id;


			if ($updname==null){
				$updname = $name;
			}

			if ($updprice==null){
				$updprice = $price;
			}

			$sql = "Update menu
					set name = '$updname'
					,price = $updprice
					where id = $id";

			// $result=
			$result=mysqli_query($conn, $sql);
			// echo $result;

			if($result) {
				header('location: menu.php');
			}
		}

		// User cancelled deletion of item
		if(isset($_POST['updno'])){

			header('location: menu.php');
		}
	}
?>