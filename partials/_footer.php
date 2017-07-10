<!-- Footer partial -->

  <!-- Sign up modal partial -->
  <?php require_once "partials/_modal_signup.php"; ?>

	<!-- Log in modal partial -->
  <?php require_once "partials/_modal_login.php"; ?>

  <!-- Update modal partial -->
  <?php require_once "partials/_modal_update.php"; ?>     


  <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h6 class="section-heading">Comments and suggestions?</h6>
                    <hr class="primary">
                    <h3>Let the admins know of concerns, requests or appreciation!</h3>
                    <br>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="social_network_icon social_facebook_circle icons-footer"></i>
                    <p><a href="#">@karaukeph</a></p>
                </div>
                 
                <div class="col-lg-4 text-center">
                    <i class="icon icon_mail_alt icons-footer"></i>
                    <p><a href="mailto:admin@karauke.ph">admin@karauke.ph</a></p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="social_network_icon social_instagram_circle icons-footer"></i>
                    <p><a href="#">@karaukeph</a></p>
                </div>
            </div>
            <div class="row text-center">
              <br class="small">
              <p class="col-lg-4 text-center text-muted">&copy; Uke Chords by Pianosnake </p>
              <p class="col-lg-4 text-center text-muted">&copy; Freepik Free Stock Photos</p>
              <p class="col-lg-4 text-center text-muted">&copy; Elegantthemes Icon Fonts</p>
            </div>
            <div class="row text-center">
              <p class="col-lg-4 text-center text-muted">&copy; SweetAlert by Tristan Edwards</p>
              <p class="col-lg-4 text-center text-muted">&copy; Karauke 2017 All Rights Reserved</p>
              <p class="col-lg-4 text-center text-muted">&copy; Easing plugin by Robert Penner</p>
            </div>
        </div>
    </footer>


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery.min.js"></script>

  <!-- Include all compiled plugins (below), 
  or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>  

  <!-- Javascript for homepage modals (signup/login) -->
  <script src="js/home_modals.js"></script>

  <!-- Javascript for menu modals (update/delete) -->
  <script src="js/menu_modals.js"></script>

  <!-- Scroll Reveal JavaScript -->
  <script src="js/scrollreveal.min.js"></script>

  <!-- Scroll Easing JavaScript -->
  <script src="js/jquery.easing.min.js"></script>

  <!-- Search and Ease JavaScript -->
  <script src="js/scrolling-nav.js"></script>

  <!-- Sweet Alert JavaScript -->
  <script src="js/sweetalert.min.js"></script>

  <!-- Ajax Function to delete account -->
  <script src="js/acctDelete.js"></script>

  <!-- Ajax Functions for song options (play, delete, pick) -->
  <script src="js/songOpts.js"></script>

  <!-- Javascript for karaoke text -->
  <?php
    if($title=='Add song') {
      echo '<script src="js/songAdd.js"></script>';
    }
    if($title=='Play song') {
      echo '<script src="js/songPlay.js"></script>';
    }
  ?>

</body>
</html>