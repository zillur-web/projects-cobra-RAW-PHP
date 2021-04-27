<?php
require 'inc/header.php';
require_once 'session.php';

$id = $_GET['id'];
$services_select = "SELECT * FROM services WHERE id = '$id'";
$services_query = mysqli_query($db, $services_select);
$services_assoc = mysqli_fetch_assoc($services_query);
$_SESSION['id'] = $id;

?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Add Services</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Add Services</h5>

      <?php
      if (isset($_SESSION['ServicesEditErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['ServicesEditErr'];
            unset($_SESSION['ServicesEditErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 

    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="services-edit-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control ServicesEditTitleErr" id="title" placeholder="Enter Services Title" name="title" value="<?=$services_assoc['title'] ?>">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['ServicesEditTitleErr'])) {
                      echo "<style>.ServicesEditTitleErr{border:1px solid red;}</style>";
                      echo $_SESSION['ServicesEditTitleErr'];
                      unset($_SESSION['ServicesEditTitleErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-6">
              <div class="form-group">
                <label for="icon">Icon: <span class="text-danger">*</span> </label>
                <!-- <input type="text" class="form-control" id="icon" placeholder="fab fa-facebook" name="icon"> -->
                <select class="form-control ServicesEditIconErr" name="icon" id="icon">
                  <option value="<?=$services_assoc['icon'] ?>">Select</option>
                  <option value="fab fa-react">Design</option>
                  <option value="fab fab fa-free-code-camp">FEATURES</option>
                  <option value="fal fa-desktop">RESPONSIVE</option>
                  <option value="fal fa-lightbulb-on">IDEAS</option>
                  <option value="fal fa-edit">CUSTOMIZATION</option>
                  <option value="fal fa-headset">SUPPORT</option>
                </select>
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['ServicesEditIconErr'])) {
                      echo "<style>.ServicesEditIconErr{border:1px solid red;}</style>";
                      echo $_SESSION['ServicesEditIconErr'];
                      unset($_SESSION['ServicesEditIconErr']);
                    }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label for="summary">Summary: <span class="text-danger">*</span> </label>
                <!-- <input type="text" class="form-control SocialLinkErr" id="summary" placeholder="Discription" name="summary"> -->
                <textarea class="form-control ServicesEditSummaryErr" id="summary" name="summary" rows="5" placeholder="Discription" value="<?=$services_assoc['summary'] ?>"></textarea>
              </div>
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['ServicesEditSummaryErr'])) {
                      echo "<style>.ServicesEditSummaryErr{border:1px solid red;}</style>";
                      echo $_SESSION['ServicesEditSummaryErr'];
                      unset($_SESSION['ServicesEditSummaryErr']);
                    }
                  ?>
                </span>
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

