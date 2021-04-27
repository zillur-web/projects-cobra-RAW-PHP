<?php
require 'inc/header.php';
require_once 'session.php';

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Add Facts</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Add Facts</h5>

      <?php
      if (isset($_SESSION['FactsAddErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['FactsAddErr'];
            unset($_SESSION['FactsAddErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 

    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="facts-add-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-6"><!-- col-6 -->
              <div class="form-group">
                <label for="future_projects">Future Item Value: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control future_projectsErr" id="future_projects" placeholder="Enter Number Of Future Projects" name="future_projects">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['future_projectsErr'])) {
                    echo "<style>.future_projectsErr{border:1px solid red;}</style>";
                    echo $_SESSION['future_projectsErr'];
                    unset($_SESSION['future_projectsErr']);
                  }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="active_projects">Active Porjects: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control active_projectsErr" id="active_projects" placeholder="Enter Number Of Active Projects" name="active_projects">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['active_projectsErr'])) {
                    echo "<style>.active_projectsErr{border:1px solid red;}</style>";
                    echo $_SESSION['active_projectsErr'];
                    unset($_SESSION['active_projectsErr']);
                  }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="year_experience">Year Experience: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control year_experienceErr" id="year_experience" placeholder="Enter Year Of Experience" name="year_experience">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['year_experienceErr'])) {
                    echo "<style>.year_experienceErr{border:1px solid red;}</style>";
                    echo $_SESSION['year_experienceErr'];
                    unset($_SESSION['year_experienceErr']);
                  }
                  ?>
                </span>
              </div> 
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label for="clients">Our Clients: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control clientsErr" id="clients" placeholder="Enter Number Of Clients" name="clients">
                <span class="text-danger">
                  <?php
                  if (isset($_SESSION['clientsErr'])) {
                    echo "<style>.clientsErr{border:1px solid red;}</style>";
                    echo $_SESSION['clientsErr'];
                    unset($_SESSION['clientsErr']);
                  }
                  ?>
                </span>
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

