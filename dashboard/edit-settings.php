<?php
   require 'inc/header.php';


  $id = $_GET['id'];
  $settings_select = "SELECT * FROM settings WHERE id = $id";
  $select_query = mysqli_query($db, $settings_select);
  $after_assoc = mysqli_fetch_assoc($select_query);

  

 ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Bios</a>
        <span class="breadcrumb-item active">Edit Settings</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Edit Settings</h5>
          <?php
            if (isset($_SESSION['SettingsUpdateErr'])) {
              ?>
              <div class="alert alert-success">
                <span>
                  <?php
                  echo $_SESSION['SettingsUpdateErr'];
                  unset($_SESSION['SettingsUpdateErr']);
                  ?>
                </span>
              </div>
              <?php
            }
          ?>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="form-layout">
            <form action="update-settings.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="row mg-b-25">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="tagline">Tag line: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control taglineErr" id="tagline" placeholder="Tag line" name="tagline" value="<?= $after_assoc['tagline']?>">
                    <span class="text-danger">
                    <?php
                      if (isset($_SESSION['taglineErr'])) {
                          echo "<style>.taglineErr{border:1px solid red;}</style>";
                          echo $_SESSION['taglineErr'];
                          unset($_SESSION['taglineErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email: <span class="text-danger">*</span></label>
                    <input type="email" class="form-control emailErr" id="email" placeholder="Enter email address" name="email" value="<?= $after_assoc['email']?>">
                   <span class="text-danger">
                    <?php
                      if (isset($_SESSION['emailErr'])) {
                          echo "<style>.emailErr{border:1px solid red;}</style>";
                          echo $_SESSION['emailErr'];
                          unset($_SESSION['emailErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div> <!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="phone">Phone: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control phoneErr" id="phone" placeholder="Enter Phone Number" name="phone" value="<?= $after_assoc['phone']?>">
                   <span class="text-danger">
                    <?php
                      if (isset($_SESSION['phoneErr'])) {
                          echo "<style>.phoneErr{border:1px solid red;}</style>";
                          echo $_SESSION['phoneErr'];
                          unset($_SESSION['phoneErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div> <!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="office_address">Office Address: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control office_addressErr" id="office_address" placeholder="Enter Office Address" name="office_address" value="<?= $after_assoc['office_address']?>">
                    <span class="text-danger">
                    <?php
                      if (isset($_SESSION['office_addressErr'])) {
                          echo "<style>.office_addressErr{border:1px solid red;}</style>";
                          echo $_SESSION['office_addressErr'];
                          unset($_SESSION['office_addressErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div> <!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="copyright">Copyright: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control copyrightErr" id="copyright" placeholder="Enter Copyright" name="copyright" value="<?= $after_assoc['copyright']?>">
                    <span class="text-danger">
                    <?php
                      if (isset($_SESSION['copyrightErr'])) {
                          echo "<style>.copyrightErr{border:1px solid red;}</style>";
                          echo $_SESSION['copyrightErr'];
                          unset($_SESSION['copyrightErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div> <!-- col-6 -->

                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="about">About: <span class="text-danger">*</span></label>
                    <textarea class="form-control aboutErr" id="about" name="about" rows="5" placeholder="Enter About" value="<?php echo $after_assoc['about'];?>"></textarea>
                    <span class="text-danger">
                    <?php
                      if (isset($_SESSION['aboutErr'])) {
                          echo "<style>.aboutErr{border:1px solid red;}</style>";
                          echo $_SESSION['aboutErr'];
                          unset($_SESSION['aboutErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div> <!-- col-6 -->
                <div class="col-lg-3"><!-- col-3 -->
                  <div class="form-group">
                    <label for="logo">Logo: <span class="text-danger">*</span> </label>
                    <input class="form-control logoErr logo_ext_Err logo_size_Err" type="file" id="logo" class="form-control" name="logo" onchange="document.getElementById('logo_id').src = window.URL.createObjectURL(this.files[0])" >
                    <span class="text-danger">
                    <?php
                      if (isset($_SESSION['logoErr'])) {
                          echo "<style>.logoErr{border:1px solid red;}</style>";
                          echo $_SESSION['logoErr'];
                          unset($_SESSION['logoErr']);
                        }
                        if (isset($_SESSION['logo_ext_Err'])) {
                          echo "<style>.logo_ext_Err{border:1px solid red;}</style>";
                          echo $_SESSION['logo_ext_Err'];
                          unset($_SESSION['logo_ext_Err']);
                        }
                        if (isset($_SESSION['logo_size_Err'])) {
                          echo "<style>.logo_size_Err{border:1px solid red;}</style>";
                          echo $_SESSION['logo_size_Err'];
                          unset($_SESSION['logo_size_Err']);
                        }
                      ?>
                    </span>
                  </div>
                </div>
                <!-- col-3 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Logo Preview: <span class="text-danger">*</span> </label><br>
                    <div class="text-center">
                      <img id="logo_id" style=" height: 150px; width: 150px;" src="upload/logo/<?= $after_assoc['logo']?>">
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

