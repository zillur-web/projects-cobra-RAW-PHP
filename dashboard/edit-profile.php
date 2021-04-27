<?php
  require 'inc/header.php';
  require_once '../database-connector.php';
  require_once 'session.php';

  $id = $_SESSION['id'];
  $select_status = "SELECT * FROM user_info WHERE id = $id";
  $edit_query = mysqli_query($db, $select_status);
  $after_assoc = mysqli_fetch_assoc($edit_query);
 ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Bios</a>
        <span class="breadcrumb-item active">Edit Profile</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Edit Profile</h5>

          <?php
            if (isset($_SESSION['ProfileUpdateSuccess'])) {
              ?>
                <div class="alert alert-success">
                  <span>
                    <?php
                      echo $_SESSION['ProfileUpdateSuccess'];
                      unset($_SESSION['ProfileUpdateSuccess']);
                    ?>
                  </span>
                </div>
              <?php
            }
          ?> 
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="form-layout">
            <form action="profile-update.php" method="POST" enctype="multipart/form-data">
              <div class="row mg-b-25"><!-- row -->
                <div class="col-lg-6"><!-- col-6 -->
                  <div class="form-group">
                    <label for="name">Name: <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control NameUpdateValidErr NameUpdateErr" id="name" placeholder="Enter Name" name="name" value="<?= $after_assoc['name']?>">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['NameUpdateErr'])) {
                            echo "<style>.NameUpdateErr{border:1px solid red;}</style>";
                            echo $_SESSION['NameUpdateErr'];
                            unset($_SESSION['NameUpdateErr']);
                        }
                      ?>
                      <?php
                        if (isset($_SESSION['NameUpdateValidErr'])) {
                            echo "<style>.NameUpdateValidErr{border:1px solid red;}</style>";
                            echo $_SESSION['NameUpdateValidErr'];
                            unset($_SESSION['NameUpdateValidErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email: <span class="text-danger">*</span> </label>
                    <input type="email" class="form-control EmailUpdateErr EmailUpdateValidErr" id="email" placeholder="Enter email" name="email" value="<?= $after_assoc['email']?>">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['EmailUpdateErr'])) {
                            echo "<style>.EmailUpdateErr{border:1px solid red;}</style>";
                            echo $_SESSION['EmailUpdateErr'];
                            unset($_SESSION['EmailUpdateErr']);
                        }
                      ?>
                      <?php
                        if (isset($_SESSION['EmailUpdateValidErr'])) {
                            echo "<style>.EmailUpdateValidErr{border:1px solid red;}</style>";
                            echo $_SESSION['EmailUpdateValidErr'];
                            unset($_SESSION['EmailUpdateValidErr']);
                        }
                      ?>
                  </div>
                </div> <!-- col-6 -->
                
              </div><!-- row -->
              <div class="row mg-b-25"><!-- row -->
                <div class="col-lg-6"><!-- col-6 -->
                  <div class="form-group">
                    <label for="profile_image">Profile Image: <span class="text-danger">*</span> </label>
                    <input class="image_Err image_size_Err form-control" type="file" id="profile_image" class="form-control" name="profile_image" onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['image_Err'])) {
                            echo "<style>.image_Err{border:1px solid red;}</style>";
                            echo $_SESSION['image_Err'];
                            unset($_SESSION['image_Err']);
                        }
                      ?>
                      <?php
                        if (isset($_SESSION['image_size_Err'])) {
                            echo "<style>.image_size_Err{border:1px solid red;}</style>";
                            echo $_SESSION['image_size_Err'];
                            unset($_SESSION['image_size_Err']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Profile Image Preview: <span class="text-danger">*</span> </label><br>
                    <div class="text-center">
                      <img id="image_id" style="border-radius: 50%; height: 150px; width: 150px;" src="upload/<?=$after_assoc['profile_image'];?>">
                    </div>
                  </div>
                </div> <!-- col-6 -->
                
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

