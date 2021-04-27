<?php
require 'inc/header.php';

$id = $_GET['id'];
$portfolio_edit_select = "SELECT * FROM portfolio WHERE id = $id";
$portfolio_edit_query = mysqli_query($db,$portfolio_edit_select);
$portfolio_edit = mysqli_fetch_assoc($portfolio_edit_query);
$_SESSION['id'] = $id;
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Edit Portfolios</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Edit Portfolios</h5>
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
      if (isset($_SESSION['PortfolioEditErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['PortfolioEditErr'];
            unset($_SESSION['PortfolioEditErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?>

    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="portfolio-edit-post.php" method="POST" enctype="multipart/form-data">
          <div class="row mg-b-25">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span></label>
                <input type="text" class="form-control EdittitleErr" id="title" placeholder="Enter Title" name="title" value="<?=$portfolio_edit['title'] ?>">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['EdittitleErr'])) {
                    echo "<style>.EdittitleErr{border:1px solid red;}</style>";
                    echo $_SESSION['EdittitleErr'];
                    unset($_SESSION['EdittitleErr']);
                  }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label for="category">Category: <span class="text-danger">*</span></label>
                <input type="text" class="form-control EditcategoryErr" id="category" placeholder="Enter  Category" name="category" value="<?=$portfolio_edit['category'] ?>">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['EditcategoryErr'])) {
                    echo "<style>.EditcategoryErr{border:1px solid red;}</style>";
                    echo $_SESSION['EditcategoryErr'];
                    unset($_SESSION['EditcategoryErr']);
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
                <textarea class="form-control EditsummaryErr" id="summary" name="summary" rows="5" placeholder="Enter Summary" value="<?=$portfolio_edit['summary'] ?>"></textarea>
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['EditsummaryErr'])) {
                    echo "<style>.EditsummaryErr{border:1px solid red;}</style>";
                    echo $_SESSION['EditsummaryErr'];
                    unset($_SESSION['EditsummaryErr']);
                  }
                  ?>
                </span>
              </div>
            </div> <!-- col-6 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label for="thumbnail">Thumbnail: <span class="text-danger">*</span> </label>
                <input class="form-control Editthumbnail_Err Editthumbnail_size_Err" type="file" id="logo" class="form-control" name="thumbnail" onchange="document.getElementById('thumbnail_id').src = window.URL.createObjectURL(this.files[0])">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['Editthumbnail_Err'])) {
                    echo "<style>.Editthumbnail_Err{border:1px solid red;}</style>";
                    echo $_SESSION['Editthumbnail_Err'];
                    unset($_SESSION['Editthumbnail_Err']);
                  }
                  if (isset($_SESSION['Editthumbnail_size_Err'])) {
                    echo "<style>.Editthumbnail_size_Err{border:1px solid red;}</style>";
                    echo $_SESSION['Editthumbnail_size_Err'];
                    unset($_SESSION['Editthumbnail_size_Err']);
                  }
                  ?>
                </span>
              </div>
            </div><!-- col-3 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label>Thumbnail Preview: <span class="text-danger">*</span> </label><br>
                <div class="text-center">
                  <img id="thumbnail_id" style=" height: 150px; width: 150px;" src="upload/thumbnail/<?=$portfolio_edit['thumbnail'];?>">
                </div>
              </div>
            </div>
            <!-- col-6 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label for="featured_image">Featured Image: <span class="text-danger">*</span> </label>
                <input class="form-control Editfeatured_Err Editfeatured_size_Err" type="file" id="featured_image" class="form-control" name="featured_image" onchange="document.getElementById('featured_image_id').src = window.URL.createObjectURL(this.files[0])">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['Editfeatured_Err'])) {
                    echo "<style>.Editfeatured_Err{border:1px solid red;}</style>";
                    echo $_SESSION['Editfeatured_Err'];
                    unset($_SESSION['Editfeatured_Err']);
                  }
                  if (isset($_SESSION['Editfeatured_size_Err'])) {
                    echo "<style>.Editfeatured_size_Err{border:1px solid red;}</style>";
                    echo $_SESSION['Editfeatured_size_Err'];
                    unset($_SESSION['Editfeatured_size_Err']);
                  }
                  ?>
                </span>
              </div>
            </div><!-- col-3 -->
            <div class="col-lg-3">
              <div class="form-group">
                <label>Featured Image Preview: <span class="text-danger">*</span> </label><br>
                <div class="text-center">
                  <img id="featured_image_id" style=" height: 150px; width: 150px;" src="upload/featured_image/<?=$portfolio_edit['featured_image'];?>">
                </div>
              </div>
            </div>
          </div><!-- row -->

          <div class="form-layout-footer">
            <input style="cursor: pointer;" type="submit" class="btn btn-info mg-r-5" value="Update">
          </div><!-- form-layout-footer -->
        </form>
      </div><!-- form-layout -->
    </div><!-- card -->


  </div><!-- sl-pagebody -->

  <!-- ########## END: MAIN PANEL ########## -->

  <?php
  require 'inc/footer.php';
  ?>

