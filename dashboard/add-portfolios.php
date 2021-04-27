<?php
  require 'inc/header.php';
 ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Bios</a>
        <span class="breadcrumb-item active">Add Portfolios</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add Portfolios</h5>
          <?php
            if (isset($_SESSION['SettingsAddErr'])) {
              ?>
              <div class="alert alert-success">
                <span>
                  <?php
                  echo $_SESSION['SettingsAddErr'];
                  unset($_SESSION['SettingsAddErr']);
                  ?>
                </span>
              </div>
              <?php
            }
          ?>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="form-layout">
            <form action="add-portfolios-post.php" method="POST" enctype="multipart/form-data">
              <div class="row mg-b-25">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="title">Title: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control titleErr" id="title" placeholder="Enter Title" name="title">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['titleErr'])) {
                          echo "<style>.titleErr{border:1px solid red;}</style>";
                          echo $_SESSION['titleErr'];
                          unset($_SESSION['titleErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="category">Category: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control categoryErr" id="category" placeholder="Enter  Category" name="category">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['categoryErr'])) {
                          echo "<style>.categoryErr{border:1px solid red;}</style>";
                          echo $_SESSION['categoryErr'];
                          unset($_SESSION['categoryErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div>
                 <!-- col-6 -->
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="summary">Summary: <span class="text-danger">*</span></label>
                   <!--  <input type="text" class="form-control" id="about" placeholder="Enter About" name="about"> -->
                   <textarea class="form-control summaryErr" id="summary" name="summary" rows="5" placeholder="Enter Summary"></textarea>
                   <span class="text-danger">
                      <?php
                        if (isset($_SESSION['summaryErr'])) {
                          echo "<style>.summaryErr{border:1px solid red;}</style>";
                          echo $_SESSION['summaryErr'];
                          unset($_SESSION['summaryErr']);
                        }
                      ?>
                    </span>
                  </div>
                </div> <!-- col-6 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="thumbnail">Thumbnail: <span class="text-danger">*</span> </label>
                    <input class="form-control thumbnail_Err thumbnail_size_Err" type="file" id="logo" class="form-control" name="thumbnail" onchange="document.getElementById('thumbnail_id').src = window.URL.createObjectURL(this.files[0])">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['thumbnail_Err'])) {
                          echo "<style>.thumbnail_Err{border:1px solid red;}</style>";
                          echo $_SESSION['thumbnail_Err'];
                          unset($_SESSION['thumbnail_Err']);
                        }
                        if (isset($_SESSION['thumbnail_size_Err'])) {
                          echo "<style>.thumbnail_size_Err{border:1px solid red;}</style>";
                          echo $_SESSION['thumbnail_size_Err'];
                          unset($_SESSION['thumbnail_size_Err']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-3 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Thumbnail Preview: <span class="text-danger">*</span> </label><br>
                    <div class="text-center">
                      <img id="thumbnail_id" style=" height: 150px; width: 150px;" src="upload/thumbnail/<?=$after_assoc['thumbnail'];?>">
                    </div>
                  </div>
                </div>
                 <!-- col-6 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="featured_image">Featured Image: <span class="text-danger">*</span> </label>
                    <input class="form-control thumbnail_Err featured_size_Err" type="file" id="featured_image" class="form-control" name="featured_image" onchange="document.getElementById('featured_image_id').src = window.URL.createObjectURL(this.files[0])">
                    <span class="text-danger">
                      <?php
                        if (isset($_SESSION['thumbnail_Err'])) {
                          echo "<style>.thumbnail_Err{border:1px solid red;}</style>";
                          echo $_SESSION['thumbnail_Err'];
                          unset($_SESSION['thumbnail_Err']);
                        }
                        if (isset($_SESSION['featured_size_Err'])) {
                          echo "<style>.featured_size_Err{border:1px solid red;}</style>";
                          echo $_SESSION['featured_size_Err'];
                          unset($_SESSION['featured_size_Err']);
                        }
                      ?>
                    </span>
                  </div>
                </div><!-- col-3 -->
                <div class="col-lg-3">
                  <div class="form-group">
                    <label>Featured Image Preview: <span class="text-danger">*</span> </label><br>
                    <div class="text-center">
                      <img id="featured_image_id" style=" height: 150px; width: 150px;" src="upload/featured-image/<?=$after_assoc['featured_image'];?>">
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

