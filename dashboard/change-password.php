<?php
require 'inc/header.php';
require_once '../database-connector.php';

// $id = $_SESSION['id'];
// $select = "SELECT * FROM user_info WHERE id = $id";
// $query = mysqli_query($db, $select);
// $after_assoc = mysqli_fetch_assoc($query);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Change Password</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Change Password</h5>
      <?php
        if (isset($_SESSION['PasswordUpdateSucess'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['PasswordUpdateSucess'];
              unset($_SESSION['PasswordUpdateSucess']);
              ?>
            </span>
          </div>
          <?php
        }
        if (isset($_SESSION['PasswordUpdateErr'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['PasswordUpdateErr'];
              unset($_SESSION['PasswordUpdateErr']);
              ?>
            </span>
          </div>
          <?php
        }
      ?> 
      
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="change-password-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="Current_Password">Current Password: <span class="text-danger">*</span> </label>
                <input type="password" class="form-control CurrentPassErr PasswordCheckErr" id="Current_Password" placeholder="Enter Current Password" name="current_password">
              </div>
              <span class="text-danger">
                <?php
                  if (isset($_SESSION['CurrentPassErr'])) {
                    echo "<style>.CurrentPassErr{border:1px solid red;}</style>";
                    echo $_SESSION['CurrentPassErr'];
                    unset($_SESSION['CurrentPassErr']);
                  }
                  if (isset($_SESSION['PasswordCheckErr'])) {
                    echo "<style>.PasswordCheckErr{border:1px solid red;}</style>";
                    echo $_SESSION['PasswordCheckErr'];
                    unset($_SESSION['PasswordCheckErr']);
                  }
                ?>
              </span>
            </div><!-- col-6 -->
          </div><!-- row -->
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="new_password">New Password: <span class="text-danger">*</span> </label>
                <input type="password" class="form-control NewPassErr NewNewPassValidErr" id="new_password" placeholder="Enter New Password" name="new_password">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['NewPassErr'])) {
                      echo "<style>.NewPassErr{border:1px solid red;}</style>";
                      echo $_SESSION['NewPassErr'];
                      unset($_SESSION['NewPassErr']);
                    }
                    if (isset($_SESSION['NewNewPassValidErr'])) {
                      echo "<style>.NewNewPassValidErr{border:1px solid red;}</style>";
                      echo $_SESSION['NewNewPassValidErr'];
                      unset($_SESSION['NewNewPassValidErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
          </div><!-- row -->
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="confirm_password">Confirm Password: <span class="text-danger">*</span> </label>
                <input type="password" class="form-control NewConPassErr NewConPassMatchErr" id="confirm_password" placeholder="Enter Confirm Password" name="confirm_password">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['NewConPassErr'])) {
                      echo "<style>.NewConPassErr{border:1px solid red;}</style>";
                      echo $_SESSION['NewConPassErr'];
                      unset($_SESSION['NewConPassErr']);
                    }
                    if (isset($_SESSION['NewConPassMatchErr'])) {
                      echo "<style>.NewConPassMatchErr{border:1px solid red;}</style>";
                      echo $_SESSION['NewConPassMatchErr'];
                      unset($_SESSION['NewConPassMatchErr']);
                    }
                  ?>
                </span>

              </div>
            </div><!-- col-6 -->
          </div><!-- row -->
          <div class="form-layout-footer">
            <input style="cursor: pointer;" type="submit" class="btn btn-info mg-r-5" value="Submit">
          </div><!-- form-layout-footer -->
        </form>
      </div><!-- form-layout -->
    </div><!-- card -->


  </div><!-- sl-pagebody -->
  
  <!-- ########## END: MAIN PANEL ########## -->

  <?php
  require 'inc/footer.php';
  ?>

