<?php
require 'inc/header.php';
require_once 'session.php';

$id = $_GET['id'];
$socials_select = "SELECT * FROM socials WHERE id = '$id'";
$socials_query = mysqli_query($db, $socials_select);
$socials_assoc = mysqli_fetch_assoc($socials_query);
$_SESSION['id'] = $id;

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Edit Socials</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Edit Socials Icon</h5>
      <?php
      if (isset($_SESSION['SocialEditErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['SocialEditErr'];
            unset($_SESSION['SocialEditErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 
    </div><!-- sl-page-title -->
    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="social-edit-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="name">Social Icon Name: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control SocialEditNameErr" id="name" value="<?=$socials_assoc['name'];?>" placeholder="Enter Icon Name" name="name" >
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['SocialEditNameErr'])) {
                    echo "<style>.SocialEditNameErr{border:1px solid red;}</style>";
                    echo $_SESSION['SocialEditNameErr'];
                    unset($_SESSION['SocialEditNameErr']);
                  }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label for="icon">Social Icon: <span class="text-danger">*</span> </label>
                <!-- <input type="text" class="form-control" id="icon" placeholder="fab fa-facebook" name="icon"> -->
                <select class="form-control SocialEditChooseErr" name="icon" id="icon">
                  <option value="<?=$socials_assoc['icon'] ?>">Select Social</option>
                  <option value="fab fa-facebook-f">Facebook</option>
                  <option value="fab fa-linkedin-in">LinkedIn</option>
                  <option value="fab fa-twitter">Twitter</option>
                  <option value="fab fa-instagram">Instagram</option>
                  <option value="fab fa-pinterest">Pinterest</option>
                  <option value="fab fa-github">GitHub</option>
                </select>
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['SocialEditChooseErr'])) {
                    echo "<style>.SocialEditChooseErr{border:1px solid red;}</style>";
                    echo $_SESSION['SocialEditChooseErr'];
                    unset($_SESSION['SocialEditChooseErr']);
                  }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="link">Social Link: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control SocialEditLinkErr" id="link" placeholder="www.example.com" name="link" value="<?=$socials_assoc['link'] ?>">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['SocialEditLinkErr'])) {
                    echo "<style>.SocialEditLinkErr{border:1px solid red;}</style>";
                    echo $_SESSION['SocialEditLinkErr'];
                    unset($_SESSION['SocialEditLinkErr']);
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

