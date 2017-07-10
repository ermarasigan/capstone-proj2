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
          <input id="search" type="text" name="find" placeholder="Title or artist" >
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
      <h2>
        <?php 
          if(isset($_SESSION['username'])){
            echo $_SESSION['username'] . " searched for";
          } else {
            echo "Recent Searches";
          }
        ?>
      </h2>
    </div>
    <div class="row">
      <?php 
          searchShow();
      ?>
    </div>
    <div class="row">
      <h2> <br> </h2>
    </div>
    <div class="row">
      <h2>
        <?php 
          if(isset($_SESSION['username'])){
            echo $_SESSION['username'] . "'s Picks";
          } else {
            echo "Users' Top Picks";
          }
        ?>
      </h2>
    </div>
    <div class="row">
      <?php 
          pickShow();
      ?>
    </div>
  </div>
</section>

<!-- Footer Partial (including javascript) -->
<?php require_once "partials/_footer.php"; ?>