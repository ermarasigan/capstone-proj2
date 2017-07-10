<?php 
  session_start();

  function get_title() {
  	global $title;
  	$title='Play song';
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
				$playtitle 	= $_SESSION['playtitle'];
      			$playartist	= $_SESSION['playartist'];
      			$playyear	= $_SESSION['playyear'];
      			$playbpm	= $_SESSION['playbpm'];
      			$playid		= $_GET['id'];
      			echo $playtitle . " - " . $playartist . " (" . $playyear . ")";
			?>
		</h2>
	</div>

	<div class="row">
		<br>
		<div class="text-center">
		<?php 
			$playchords=[];

			// Get song chords and display
			$filename = "json/songs/song" . $playid . "_chords.json";
			fopen($filename,'a');
			$string = file_get_contents($filename);

			if($string != null) {
				$playchords = json_decode($string, true);
				showChords('small',$playchords);
			}
		?>
		</div>
	</div>

	<div class="row">		
		<div class="text-center">
			<button id='togglebtn' class='btn btn-default btn-primary' type='submit' 
					onclick='toggleLyrics();'>Play</button>
			<button id='stopbtn' class='btn btn-default btn-default' type='submit' 
					onclick='stopSong();'>Stop</button>
			<?php
				echo "
				<input type='hidden' id='getid' value='$playid'>";
				echo "
				<input type='hidden' id='getbpm' value='$playbpm'>";
			?>
		</div>
	</div>

	<canvas id="draw-pad" width="700" height="120">
	</canvas>
</main>

<!-- Footer Partial (including javascript) -->
<?php require_once "partials/_footer.php"; ?>