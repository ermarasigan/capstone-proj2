<?php
	
	function showmenu($action) {

		global $conn;

		$sql = "SELECT id, name, price FROM menu
					where date = current_date";

			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					extract($row);
			    	
					// Edit and delete buttons
					if(!isset($_SESSION['role'])) { 
						$_SESSION['role'] = '';
					}
			
					if($_SESSION['role']=='admin'){
				    	$buttons = 
				    		"<div class='form-group'>
				    			<a href='menu_update.php?id=$id'>
									<button class='btn btn-warning btn-md'>
										Edit 
									</button>
							  	</a>
							  	<a href='menu_delete.php?id=$id'>
									<button class='btn btn-warning btn-md'>
										Delete 
									</button>
							  	</a>
							</div>";
					} else {
						$buttons='';
					}

					if($_SESSION['checkout']=='yes'){
						$cartbtn='';
						$buttons='';
					} else {
						$cartbtn = 
						  	 "<input class='btn btn-default btn-lg' type='submit' id='$id' name='addtocart' style:'padding-top: 20px; display:block;'
						  	 	value='Add to Cart' onclick='ajaxPost(this.id);'>
					  	 	<input type='hidden' id='quantity$id' name='quantity' value=1>
					  	 	<input type='hidden' id='itemname$id' name='itemname' value='$name'>
					  	 	<input type='hidden' id='itemprice$id' name='itemprice' value=$price>
					  	 	";
					 }			

					// Buttons to confirm or cancel Delete
					$delete_confirmation = 
						"<form method='post' action=''>
							<h5>Are you sure you want to delete?</h5>
							<button class='btn btn-default btn-sm' name='yes'>Yes</button>
							<button class='btn btn-default btn-sm' name='no'>No</button>
						</form>";


					// Buttons to confirm or cancel Update
					$update_confirmation = 
						"<form method='post' action='' style='background-color: transparent; border: none; color: black; font-size: 0.54em'>
		    				<div class='form-group'>
								<input type='text' name='updname' placeholder=$name>
							</div>
							<div class='form-group'>
								<input type='number' min=0 name='updprice' placeholder=$price>
							</div>	
							<h5 style='color:white'>Are you sure you want to update?</h5>
							<br>
							<button class='btn btn-default btn-sm' name='updyes'>Yes
							</button>
							<button class='btn btn-default btn-sm' name='updno'>No
							</button>
						</form>";

					if ($action=='display') {
						echo "<div class='itembox clear'>
						    	$name <br>
			    				$price <br>
				    			$buttons
				    			$cartbtn
							  </div>";
					}

					if ($action=='additem') {
						echo "<div class='itembox clear'>
						    	$name <br>
			    				$price <br>
				    			$buttons
							  </div>";
					}

					if ($action=='delete') {
						if ($_GET['id'] == $id) {
			    			echo "<div class='itembox deletebox clear'>";
			    		} else {
			    			echo "<div class='itembox clear'>";
			    		}
			    		echo $name . '<br>';
			    		echo $price . '<br>';
			    		if ($_GET['id'] == $id) {
				    		echo $delete_confirmation;
						} else {
							echo $buttons;
						}
						echo "</div>";
					}

					if ($action=='update') {
						if ($_GET['id'] == $id) {
			    			echo "<div class='itembox deletebox clear'>";
			    		} else {
			    			echo "<div class='itembox clear'>";
			    		}
			    		if ($_GET['id'] == $id) {
				    		echo $update_confirmation;
						} else {
							echo $name . '<br>';
			    			echo $price . '<br>';
			    			echo $buttons;
						}
						echo "</div>";
			    	}
		    	}
			} else {
				echo "Menu not yet uploaded for today. <br> 
				Standby for updates.";
		}
	}
?>