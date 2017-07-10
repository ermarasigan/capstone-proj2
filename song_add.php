<?php 
  session_start();

  function get_title() {
  	global $title;
  	$title='Add song';
  	echo $title;
  }
?>

<!-- Header Partial (including php functions) -->
<?php require_once "partials/_header.php"; ?>

<!-- Main Section -->
<main class="container" id="addsongbg">
	<div class="row">
		<h2 class="text-center">
			<?php 
				if(!isset($_SESSION['role'])){
					$_SESSION['role']='';
				}
				if ($_SESSION['role']=='admin') {
					echo "Add/Update Song";
				} else {
					echo "Preview Song";
				}
			?>
		</h2>
	</div>

	<div class="row">
		<div class="col-md-4 col-lg-4">
			<div class="form-group">
              <input type="text" class="form-control" id="songtitle" name="songtitle" placeholder="Song Title">
              <label for="songartist"></label>
              <input type="text" class="form-control" id="songartist" name="songartist" placeholder="Song Artist">
              <div class="row">
              	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              			<label for="songyear"></label>
		            	<input id="songyear" class="form-control" type="number" min=1900 placeholder="Song Year">
		        </div>
		        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		        		<label for="songbpm"></label>
		            	<input id="songbpm" class="form-control" type="number" min=0 placeholder="Beats Per Minute">
		       	</div>
		      </div>
            </div>
         </div>

		<div class="col-md-6 col-lg-6">
			<textarea id="textarea" rows="8" cols="30" placeholder="Type chords and lyrics in alternate lines. Preview partially by selecting lines." required="required"></textarea>
		</div>
		
		<div class="col-md-2 col-lg-2 text-center">
			<button id="previewbtn" type="button" class='btn btn-default btn-info' 
					onclick="previewLyrics()">Preview</button>
			<button id='togglebtn' class='btn btn-default btn-default' type='submit' 
					onclick='toggleLyrics();'>Play</button>
			<?php 
				if ($_SESSION['role']=='admin') {
					echo "
					<button id='savebtn' class='btn btn-default btn-success' type='submit' 
							onclick='saveSong();'>Save</button>";
				}
			?>
			<button id='stopbtn' class='btn btn-default btn-default' type='submit' 
					onclick='stopSong();'>Stop</button>
		</div>
	</div>

	<canvas id="draw-pad" width="700" height="120">
	</canvas>
</main>

<!-- Chord Section -->
<section id="chordlookup" class="about-section">
  <div class="container">
    <div class="row">
    	<div class="text-center">
    		<h2>Look up Chords</h2>
    	</div>
    	<br>
    	<div class="col-lg-6 col-lg-offset-3">
		    <form action="#chordlookup" method="post">
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
			convertChords('large')
		?>
	</div>
  </div>
</section>

<!-- Footer Partial (including javascript) -->
<?php require_once "partials/_footer.php"; ?>