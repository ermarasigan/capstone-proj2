<!-- Header partial -->
<?php require_once "phpfun/connectDB.php"; ?>
<?php require_once "phpfun/acctLogin.php"; ?>
<?php require_once "phpfun/acctSignup.php"; ?>
<?php require_once "phpfun/acctLogout.php" ?>
<?php require_once "phpfun/acctUpdate.php" ?>
<?php require_once "phpfun/songShow.php"; ?>
<?php require_once "phpfun/ukeTabs.php" ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head -->

	<title><?php get_title() ?></title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font_declarations.css">

	<!-- Formatting -->
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="css/scrolling-nav.css">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">

	<!-- Ukulele tab generator by pianosnake-->
	<script src="dist/webcomponents-lite.min.js"></script>
	<link rel="import" href="dist/uke-chord.html">

</head>
<body>

<nav id="js-header" class="navbar navbar-default navbar-fixed-top" >
 	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span>
      	<span class="icon-bar"></span> 
		</button>
		<a id="js-brand" class="navbar-brand" href="index.php">
			Karauke
		</a>
	</div>
	<div class="collapse navbar-collapse" id="myNavbar">
  		<ul class="nav navbar-nav navbar-right">
	  		<?php 
	  			if(!isset($_SESSION['role'])) {
	  				$_SESSION['role'] = '';
	  			}

	  			if($_SESSION['role']=='admin') {
	  				if($title=='Home page') {
		  				echo '<li>
						          <a  id="user-action" href="song_add.php" class="text-right">
							         <span class="glyphicon glyphicon-music"></span> 
							         Update Songs 
						          </a>
					         </li>';
	  				} else {
	  					echo '<li>
						          <a  id="user-action" href="index.php" class="text-right">
							         <span class="glyphicon glyphicon-home"></span> 
							         Home
						          </a>
					         </li>';
	  				}
	          	}

	          	// Display user picks in home page instead
	  			// if($_SESSION['role']>'') {
	          		// echo '<li>
					        //   <a  id="user-action" href="index.php" class="text-right">
						       //   <span class="glyphicon glyphicon-star"></span> 
						       //   My Picks
					        //   </a>
				         // </li>';
	          	// } 	          	
	  		?>
  		
	    	<li>
				<a  id="js-signup" href="#" data-toggle="modal" 
					<?php
						if (isset($_SESSION['username'])){ 
							echo 'data-target="#update_modal"';
						}else{
							echo 'data-target="#signup_modal"';
						}
					?>					
				class="text-right">
					<span class="glyphicon glyphicon-user"></span> 
					<?php if(isset($_SESSION['username'])) {
	      					echo $_SESSION['username'];
	      				} else {
	      					echo 'Sign Up';
	      				}
	    				?>
				</a>
			</li>

		   	<li>
				<?php 
					if(isset($_SESSION['username'])) {
	    				echo '<a id="menu-logout" href="#" class="text-right" >
	    						<form method="POST" action ="">
	    						<button type="submit" name="logout">
	      					<span class="glyphicon glyphicon-log-out"></span>
	      					Log out
	      					</button>
	      					</form>
							</a>';
	  				} else {
	  					echo '<a id="js-login" href="#" data-toggle="modal" data-target="#login_modal" class="text-right">
								<span class="glyphicon glyphicon-log-in"></span>
	  							Login
	    					</a>';
	  				} 
				?>
	    	</li>
  		</ul>
	</div>
</nav>