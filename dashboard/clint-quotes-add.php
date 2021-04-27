<?php
  require 'inc/header.php';
 ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Bios</a>
        <span class="breadcrumb-item active">Add Clint Quotes</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add Clint Quotes</h5>
          <?php
            if (isset($_SESSION['ClintAddErr'])) {
              ?>
              <div class="alert alert-success">
                <span>
                  <?php
                  echo $_SESSION['ClintAddErr'];
                  unset($_SESSION['ClintAddErr']);
                  ?>
                </span>
              </div>
              <?php
            }
          ?>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="form-layout">
            <form action="clint-quotes-add-post.php" method="POST" enctype="multipart/form-data">
              <div class="row mg-b-25">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Clint Name: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control ClintNameErr" id="name" placeholder="Enter Clint Name" name="name">
                    <span class="text-danger">
                      <?php 
                        if (isset($_SESSION['ClintNameErr'])) {
                          echo "<style>.ClintNameErr{border:1px solid red;}</style>";
                          echo $_SESSION['ClintNameErr'];
                          unset($_SESSION['ClintNameErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="designation">Clint Designation: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control ClintDesignationErr" id="designation" placeholder="Enter Clint Designation" name="designation">
                    <span class="text-danger">
                      <?php 
                        if (isset($_SESSION['ClintDesignationErr'])) {
                          echo "<style>.ClintDesignationErr{border:1px solid red;}</style>";
                          echo $_SESSION['ClintDesignationErr'];
                          unset($_SESSION['ClintDesignationErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div> <!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="quotes">Quotes: <span class="text-danger">*</span></label>
                     <textarea class="form-control ClintquotesErr" id="quotes" name="quotes" rows="5" placeholder="Enter Clint Quotes"></textarea>
                    <span class="text-danger">
                      <?php 
                        if (isset($_SESSION['ClintquotesErr'])) {
                          echo "<style>.ClintquotesErr{border:1px solid red;}</style>";
                          echo $_SESSION['ClintquotesErr'];
                          unset($_SESSION['ClintquotesErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div>
                <div class="col-lg-3"><!-- col-3 -->
                  <div class="form-group">
                    <label for="image">Clint Image: <span class="text-danger">*</span> </label>
                    <input class="form-control ClintImageErr ClintExtErr ClintImageFileSizeErr" type="file" id="image" class="form-control" name="image" onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                    <span class="text-danger">
                      <?php 
                        if (isset($_SESSION['ClintImageErr'])) {
                          echo "<style>.ClintImageErr{border:1px solid red;}</style>";
                          echo $_SESSION['ClintImageErr'];
                          unset($_SESSION['ClintImageErr']);
                        }
                        if (isset($_SESSION['ClintExtErr'])) {
                          echo "<style>.ClintExtErr{border:1px solid red;}</style>";
                          echo $_SESSION['ClintExtErr'];
                          unset($_SESSION['ClintExtErr']);
                        }
                        if (isset($_SESSION['ClintImageFileSizeErr'])) {
                          echo "<style>.ClintImageFileSizeErr{border:1px solid red;}</style>";
                          echo $_SESSION['ClintImageFileSizeErr'];
                          unset($_SESSION['ClintImageFileSizeErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-3 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Clint Image Preview: <span class="text-danger">*</span> </label><br>
                    <div class="text-center">
                      <img id="image_id" style=" height: 150px; width: 150px;">
                    </div>
                  </div>
                </div> <!-- col-6 -->
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

