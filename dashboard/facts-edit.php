<?php
require 'inc/header.php';
require_once 'session.php';
$id = $_GET['id'];
$facts_select = "SELECT * FROM facts WHERE id = $id";
$facts_query = mysqli_query($db,$facts_select);
$facts = mysqli_fetch_assoc($facts_query);
$_SESSION['id'] = $id;

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Edit Facts</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Edit Facts</h5>

      <?php
      if (isset($_SESSION['FactsUpdateErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['FactsUpdateErr'];
            unset($_SESSION['FactsUpdateErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 

    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="facts-edit-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="future_projects">Future Item Value: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control future_projectsEditErr" id="future_projects" placeholder="Enter Number Of Future Projects" name="future_projects" value="<?=$facts['future_projects']?>">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['future_projectsEditErr'])) {
                    echo "<style>.future_projectsEditErr{border:1px solid red;}</style>";
                    echo $_SESSION['future_projectsEditErr'];
                    unset($_SESSION['future_projectsEditErr']);
                  }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="active_projects">Active Porjects: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control active_projectsEditErr" id="active_projects" placeholder="Enter Number Of Active Projects" name="active_projects" value="<?=$facts['active_projects']?>">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['active_projectsEditErr'])) {
                    echo "<style>.active_projectsEditErr{border:1px solid red;}</style>";
                    echo $_SESSION['active_projectsEditErr'];
                    unset($_SESSION['active_projectsEditErr']);
                  }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="year_experience">Year Experience: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control year_experienceEditErr" id="year_experience" placeholder="Enter Year Of Experience" name="year_experience" value="<?=$facts['year_experience']?>">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['year_experienceEditErr'])) {
                    echo "<style>.year_experienceEditErr{border:1px solid red;}</style>";
                    echo $_SESSION['year_experienceEditErr'];
                    unset($_SESSION['year_experienceEditErr']);
                  }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="clients">Our Clients: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control clientsEditErr" id="clients" placeholder="Enter Number Of Clients" name="clients" value="<?=$facts['clients']?>">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['clientsEditErr'])) {
                    echo "<style>.clientsEditErr{border:1px solid red;}</style>";
                    echo $_SESSION['clientsEditErr'];
                    unset($_SESSION['clientsEditErr']);
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

