<?php 
  session_start();

  function get_title() {
  	global $title;
  	$title='Add song (admin only)';
  	echo $title;
  }
?>

<!-- Header Partial (including php functions) -->
<?php require_once "partials/_header.php"; ?>

<!-- Main Section -->
<!-- <main class="container-fluid" id="welcomebox">
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
 -->
<!-- Main Section -->
<main class="container" id="addsongbg">
	<div class="row">

		<h2 class="text-center">Add Song</h2>
		<br>
	</div>
	<div class="row">


		<div class="col-lg-4">
			<div class="form-group">
              <input type="text" class="form-control" id="songtitle" name="songtitle" placeholder="Song Title">
              <br>
              <input type="text" class="form-control" id="songartist" name="songartist" placeholder="Song Artist">
              <br>
              <div class="row">
              	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		              <input id="songyear" class="form-control" type="year" placeholder="Song Year">
		              <br>
		        </div>
		        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		              <input id="songbpm" class="form-control" type="number" min=0 placeholder="Beats Per Minute">
		       </div>
		      </div>
            </div>
         </div>


		<!-- <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8"> -->
		<div class="col-lg-6">
			<textarea id="textarea" rows="8" cols="30" placeholder="Type chords and lyrics in alternate lines" required="required"></textarea>
		</div>
		


		
		<div class="col-lg-2 text-center">
			<button type="button" class='btn btn-default btn-info' onclick="previewLyrics()">Preview</button>
			<button id='togglebtn' class='btn btn-default btn-default' type='submit' onclick='toggleLyrics();'>Play</button>
			<button id='savebtn' class='btn btn-default btn-success' type='submit' onclick='saveSong();'>Save</button>
		</div>
			

		<!-- <uke-chord frets='0020' size='L'  position=0 name='A'  style='background: white; padding-right: 20px; margin: 10px;'></uke-chord> -->
	</div>
	<!-- <div class="row">
		<div class="col-lg-12" id="canvas-container">
			<canvas id="draw-pad" width="700" height="200">
			</canvas>
		</div>
	</div> -->
	<canvas id="draw-pad" width="700" height="120">
	</canvas>
</main>

<!-- About Section -->
<section id="about" class="about-section">

		

  <div class="container">
    <div class="row">
    	<div class="text-center">
    		<h2>Look up Chords</h2>
    	</div>
    	<br>
    	<div class="col-lg-6 col-lg-offset-3">
		    <form action="#about" method="post">
				<input id="searchtabs" type="text" name="chord" placeholder="Type chords separated by spaces">
				<button type="submit" class="btn btn-default btn-lg" name="convert">
					Get chord tabs
				</button>
			</form>
		</div>
	</div>
	<div class="row">
		<br>
		<?php 
			convertChords()
		?>
	</div>
  </div>
</section>

<!-- Footer Partial (including javascript) -->
<?php require_once "partials/_footer.php"; ?>