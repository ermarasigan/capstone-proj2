<?php 
  session_start();

  function get_title() {
  	global $title;
  	$title='Menu page - add item';
  	echo $title;
  }
?>

<!-- Header Partial (including php functions) -->
<?php require_once "partials/_header.php"; ?>

<!-- Main Section -->
<main class="container-fluid" id="welcomebox">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<h1> Everyone loves to eat </h1>
			<?php 
				if (isset($_SESSION['username'])){
					showmenu('additem');
				} 
			?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<br>
			<?php 
				if(!isset($_SESSION['role'])){
					$_SESSION['role']='';
				}

				if($_SESSION['role']=='admin'){
				echo '
					<form method="post" action="">
						<div class="form-group">
							<label for="name">Item name:</label>
							<input type="text" name="name" id="name">
						</div>
						<div class="form-group">
						 	<label for="price">Item price:</label>
							<input type="number" min=0 name="price" id="price">
						</div>
						<button name="additem" class="btn btn-info">Add Item</button>
						<button name="cancel" class="btn btn-warning">Cancel</button>
					</form>
					';
				}
			?>
		</div>
	</div>
</main>

<!-- Footer Partial (including javascript) -->
<?php require_once "partials/_footer.php"; ?>