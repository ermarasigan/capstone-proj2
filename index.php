<?php 
  session_start();

  function get_title() {
  	global $title;
  	$title='Home page';
  	echo $title;
  }
?>

<!-- Header Partial (including php functions) -->
<?php require_once "partials/_header.php"; ?>

<!-- Main Section -->
<main class="container-fluid" id="welcomebg">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
			<div id="whiteborder">
			  <h2 id="welcometext"> 

          <?php
            if(!isset($_SESSION['username'])){
              echo "Play the Ukulele <br> Karaoke Style!"; 
            } else {
              echo "Welcome back <br>" . $_SESSION['username']. "!"; 
            }
          ?>
        </h2>
        <form id="searchform" method="POST" action="">
          <input id="search" type="text" name="find" placeholder="Type title or artist" >
          <a id="searchbtn" class="btn btn-default btn-lg page-scroll" href="#">
            Find
          </a>
        </form>
			</div>
		</div>
	</div>
</main>

<!-- About Section -->
<section id="about" class="about-section">
  <div class="container">
    <div class="row">
      <?php 
          $filename = "json/search.json";
          fopen($filename,'a');
          $string = file_get_contents($filename);

          if($string != null) {
            $array = json_decode($string, true);
          } 

          // if (sizeof($array)==0){
          //   showPicks();
          // }

          // var_dump(sizeof($array));
          switch (sizeof($array)%4) {
            case 0:
              $colwidth = "col-lg-3";
              break;

            case 1:
              $colwidth = "col-lg-12";
              break;

            case 2:
              $colwidth = "col-lg-6";
              break;

            case 3:
              $colwidth = "col-lg-4";
              break;
            
            default:
              $colwidth = "col-lg-12";
              break;
          }

        foreach ($array as $key) {
          echo
          "<div class='$colwidth song-column' >
            <div class='center' style='background: blue; margin: 40px auto; width: 20%; height: 50px;'>
              $key $colwidth
            </div>
          </div>";
        }
      ?>
      
    </div>
  </div>
</section>

<!-- Footer Partial (including javascript) -->
<?php require_once "partials/_footer.php"; ?>