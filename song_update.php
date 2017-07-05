<?php 
  session_start();

  function get_title() {
  	global $title;
  	$title='Menu page - update item';
  	echo $title;
  }
?>

<!-- Header Partial (including php functions) -->
<?php require_once "partials/_header.php"; ?>

<!-- Main Section -->
<main class="container-fluid" id="welcomebox">
	<div class="row text-center">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
			<h1> Everyone loves to eat </h1>
			<?php 
				if (isset($_SESSION['username'])){
					showmenu('update'); 
				}
			?>			
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			
		</div>
	</div>
</main>

<!-- Footer Partial (including javascript) -->
<?php require_once "partials/_footer.php"; ?>