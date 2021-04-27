<?php
require 'inc/header.php';
require_once 'session.php';

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Add Social</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Add Social Icon</h5>

      <?php
      if (isset($_SESSION['SocialUpdateErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['SocialUpdateErr'];
            unset($_SESSION['SocialUpdateErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 

    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="social-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="name">Social Icon Name: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control SocialNameErr" id="name" placeholder="Enter Icon Name" name="name">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['SocialNameErr'])) {
                      echo "<style>.SocialNameErr{border:1px solid red;}</style>";
                      echo $_SESSION['SocialNameErr'];
                      unset($_SESSION['SocialNameErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label for="icon">Social Icon: <span class="text-danger">*</span> </label>
                <!-- <input type="text" class="form-control" id="icon" placeholder="fab fa-facebook" name="icon"> -->
                <select class="form-control SocialChooseErr" name="icon" id="icon">
                  <option value>Select Social</option>
                  <option value="fab fa-facebook-f">Facebook</option>
                  <option value="fab fa-linkedin-in">LinkedIn</option>
                  <option value="fab fa-twitter">Twitter</option>
                  <option value="fab fa-instagram">Instagram</option>
                  <option value="fab fa-pinterest">Pinterest</option>
                  <option value="fab fa-github">GitHub</option>
                </select>
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['SocialChooseErr'])) {
                      echo "<style>.SocialChooseErr{border:1px solid red;}</style>";
                      echo $_SESSION['SocialChooseErr'];
                      unset($_SESSION['SocialChooseErr']);
                    }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="link">Social Link: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control SocialLinkErr" id="link" placeholder="www.example.com" name="link">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['SocialLinkErr'])) {
                      echo "<style>.SocialLinkErr{border:1px solid red;}</style>";
                      echo $_SESSION['SocialLinkErr'];
                      unset($_SESSION['SocialLinkErr']);
                    }
                  ?>
                </span>
              </div> 
            </div>
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

