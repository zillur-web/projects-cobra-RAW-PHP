<?php
require 'inc/header.php';
require_once 'session.php';

?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Add Qualification</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Add Qualification</h5>

      <?php
      if (isset($_SESSION['AddQualificationErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['AddQualificationErr'];
            unset($_SESSION['AddQualificationErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 

    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <div class="form-layout">
        <form action="add-qualification-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-7"><!-- col-6 -->
              <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control AddQualificationTitleErr" id="title" placeholder="Enter Graduation Title" name="title">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['AddQualificationTitleErr'])) {
                      echo "<style>.AddQualificationTitleErr{border:1px solid red;}</style>";
                      echo $_SESSION['AddQualificationTitleErr'];
                      unset($_SESSION['AddQualificationTitleErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-3"><!-- col-6 -->
              <div class="form-group">
                <label for="year">Passing Year: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control AddQualificationYearErr" id="year" placeholder="Enter Your  Passing Year" name="year">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['AddQualificationYearErr'])) {
                      echo "<style>.AddQualificationYearErr{border:1px solid red;}</style>";
                      echo $_SESSION['AddQualificationYearErr'];
                      unset($_SESSION['AddQualificationYearErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-2"><!-- col-6 -->
              <div class="form-group">
                <label for="result">Result : <span class="text-danger">*</span> </label>
                <select class="form-control AddQualificationResultErr" id="result" name="result">
                <?php
                  for ($i=0; $i<=100; $i++){ 
                    ?>
                    <option value="<?php echo $i;?>"><?php echo  $i.' %';?></option>
                    <?php
                  }
                ?>
                </select>
                <!-- <input type="text" class="form-control" id="result" placeholder="Enter Result Persentange" name="result"> -->
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['AddQualificationResultErr'])) {
                      echo "<style>.AddQualificationResultErr{border:1px solid red;}</style>";
                      echo $_SESSION['AddQualificationResultErr'];
                      unset($_SESSION['AddQualificationResultErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
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

