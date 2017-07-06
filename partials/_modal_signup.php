<!-- Modal partial for Sign Up button -->

<div class="container">
  <div class="modal fade" id="signup_modal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <!-- Modal Header-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            &times;
          </button>
          <h4 class="modal-title">Sign Up</h4>
        </div>

        <!-- Modal Body-->
        <div class="modal-body">
          <form action="" method="POST">

            <!-- <div class="form-group">
              <label for="regcode">Group Code:</label>
              <input type="text" class="form-control" id="regcode" name="regcode">
            </div> -->

            <div class="form-group">
              <label for="reguser">Username:</label>
              <?php
                echo '<input type="text" class="form-control" id="reguser" name="reguser"';
                if (isset($_POST['reguser'])){
                  echo "value='" . $_POST['reguser'] . "'";
                }
                echo '>';
              ?>
            </div>

            <div class="form-group">
              <label for="regpswd1">Password:</label>
              <?php
                echo '<input type="password" class="form-control" id="regpswd1" name="regpswd1"';
                if (isset($_POST['regpswd1'])){
                  echo "value='" . $_POST['regpswd1'] . "'";
                }
                echo '>';
              ?>
            </div>

            <div class="form-group">
              <label for="regpswd2">Confirm Password:</label>
              <?php
                echo '<input type="password" class="form-control" id="regpswd2" name="regpswd2"';
                if (isset($_POST['regpswd2'])){
                  echo "value='" . $_POST['regpswd2'] . "'";
                }
                echo '>';
              ?>
            </div>

            <div class="form-group">
              <label for="regemail">Email:</label>
              <?php
                echo '<input type="email" class="form-control" id="regemail" name="regemail"';
                if (isset($_POST['regemail'])){
                  echo "value='" . $_POST['regemail'] . "'";
                }
                echo '>';
              ?>
            </div>

            <div class="form-group">
              <label for="regbirth">Birthdate:</label>
              <?php
                echo '<input type="date" class="form-control" id="regbirth" name="regbirth"';
                if (isset($_POST['regbirth'])){
                  echo "value='" . $_POST['regbirth'] . "'";
                }
                echo '>';
              ?>
            </div>

            <div class="form-group">
              <button type="submit" name="signup"  class="btn btn-info btn-block">
                Sign Up
              </button>
            </div>
            <?php
                if ($signup_status=="signup_error") {
                  echo '<div class="alert alert-danger">';
                  echo $output;
                  echo '</div>'; 
                }
                if ($signup_status=="signup_success") {
                  echo '<div class="alert alert-success">';
                  echo $output;
                  echo '</div>';
                  echo '<button type="button" class="btn btn-primary btn-block"'; 
                  echo 'data-toggle="modal" data-dismiss="modal" data-target="#login_modal">';
                  echo 'Log In';
                  echo '</button>';
                }
              ?>
          </form>
        </div>

        <!-- Modal Footer-->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>  
</div>