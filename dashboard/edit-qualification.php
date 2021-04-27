<?php
require 'inc/header.php';
require_once 'session.php';

  $id = $_GET['id'];
  $select_status = "SELECT * FROM qualifications WHERE id = $id";
  $query = mysqli_query($db, $select_status);
  $after_assoc = mysqli_fetch_assoc($query);
  $_SESSION['id'] = $id;

?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Edit Qualification</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Edit Qualification</h5>

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
        <form action="edit-qualification-post.php" method="POST">
          <div class="row mg-b-25"><!-- row -->
            <div class="col-lg-7"><!-- col-6 -->
              <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control EditQualificationTitleErr" id="title" placeholder="Enter Graduation Title" name="title" value="<?=$after_assoc['title'];?>">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['EditQualificationTitleErr'])) {
                      echo "<style>.EditQualificationTitleErr{border:1px solid red;}</style>";
                      echo $_SESSION['EditQualificationTitleErr'];
                      unset($_SESSION['EditQualificationTitleErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-3"><!-- col-6 -->
              <div class="form-group">
                <label for="year">Passing Year: <span class="text-danger">*</span> </label>
                <input type="text" class="form-control EditQualificationYearErr" id="year" placeholder="Enter Your  Passing Year" name="year" value="<?=$after_assoc['year'];?>">
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['EditQualificationYearErr'])) {
                      echo "<style>.EditQualificationYearErr{border:1px solid red;}</style>";
                      echo $_SESSION['EditQualificationYearErr'];
                      unset($_SESSION['EditQualificationYearErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
            <div class="col-lg-2"><!-- col-6 -->
              <div class="form-group">
                <label for="result">Result : <span class="text-danger">* </span> </label>
                <select class="form-control EditQualificationResultErr" id="result" name="result">
                <?php
                  for ($i=0; $i<=100; $i++){ 
                    ?>
                    <option value="<?php echo $i;?>"><?php echo  $i.' %';?></option>
                    <?php
                  }
                ?>
                </select>
                <span class="text-danger">
                  <?php
                    if (isset($_SESSION['EditQualificationResultErr'])) {
                      echo "<style>.EditQualificationResultErr{border:1px solid red;}</style>";
                      echo $_SESSION['EditQualificationResultErr'];
                      unset($_SESSION['EditQualificationResultErr']);
                    }
                  ?>
                </span>
              </div>
            </div><!-- col-6 -->
          </div><!-- row -->

            <div class="form-layout-footer">
              <input style="cursor: pointer;" type="submit" class="btn btn-info mg-r-5" value="Edit">
            </div><!-- form-layout-footer -->
          </form>
        </div><!-- form-layout -->
      </div><!-- card -->


    </div><!-- sl-pagebody -->

    <!-- ########## END: MAIN PANEL ########## -->

    <?php
    require 'inc/footer.php';
    ?>

