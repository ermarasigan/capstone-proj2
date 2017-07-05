<!-- Modal partial for Log In button -->

<div class="container">
  <div class="modal fade " id="login_modal" role="dialog"
    data-backdrop="static" data-keyboard="false">  
      <!-- don't close modal when clicked outside window -->
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <!-- Modal Header-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Log In</h4>
        </div>

        <!-- Modal Body-->
        <div class="modal-body">
          <form action="" method="POST">

            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
              <button id="login_btn" type="submit" name="login" class="btn btn-primary btn-block">
                Log In
              </button>
            </div>
              <?php
                if ($login_status=="login_error") {
                  echo '<div class="alert alert-danger">';
                  echo 'Incorrect login details';
                  echo '</div>'; 
                }
              ?>
            <div class="form-group">
              <label for="notmem">Not a member yet?</label>
              <button id="notmem" type="button" class="btn btn-info btn-block" 
                      data-toggle="modal" data-dismiss="modal" data-target="#signup_modal">
                Sign Up
              </button>
            </div>
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