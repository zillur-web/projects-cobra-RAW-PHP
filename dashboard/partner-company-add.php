<?php
  require 'inc/header.php';
 ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Bios</a>
        <span class="breadcrumb-item active">Add Partner</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add Partner</h5>
          <?php
            if (isset($_SESSION['PartnerUpdateErr'])) {
              ?>
              <div class="alert alert-success">
                <span>
                  <?php
                  echo $_SESSION['PartnerUpdateErr'];
                  unset($_SESSION['PartnerUpdateErr']);
                  ?>
                </span>
              </div>
              <?php
            }
          ?>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="form-layout">
            <form action="partner-company-post.php" method="POST" enctype="multipart/form-data">
              <div class="row mg-b-25">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="companyName">Company Name: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control nameErr" id="companyName" placeholder="Enter Company Name" name="companyName">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['nameErr'])) {
                          echo "<style>.nameErr{border:1px solid red;}</style>";
                          echo $_SESSION['nameErr'];
                          unset($_SESSION['nameErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="companyLogo">Company Logo: <span class="text-danger">*</span> </label>
                    <input class="form-control companylogoErr FileSizeErr" type="file" id="companyLogo" class="form-control" name="companylogo" onchange="document.getElementById('companyLogo_id').src = window.URL.createObjectURL(this.files[0])">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['companylogoErr'])) {
                          echo "<style>.companylogoErr{border:1px solid red;}</style>";
                          echo $_SESSION['companylogoErr'];
                          unset($_SESSION['companylogoErr']);
                        }
                        if (isset($_SESSION['FileSizeErr'])) {
                          echo "<style>.FileSizeErr{border:1px solid red;}</style>";
                          echo $_SESSION['FileSizeErr'];
                          unset($_SESSION['FileSizeErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-3 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Company Logo Preview: <span class="text-danger">*</span> </label><br>
                    <div class="text-center">
                      <img id="companyLogo_id" style=" height: 150px; width: 150px;">
                    </div>
                  </div>
                </div>
              </div><!-- row -->

              <div class="form-layout-footer">
                <input style="cursor: pointer;" type="submit" class="btn btn-info mg-r-5" value="Add">
              </div><!-- form-layout-footer -->
            </form>
          </div><!-- form-layout -->
        </div><!-- card -->


      </div><!-- sl-pagebody -->
      
<!-- ########## END: MAIN PANEL ########## -->

<?php
  require 'inc/footer.php';
?>

