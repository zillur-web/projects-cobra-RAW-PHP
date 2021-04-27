<?php
  require 'inc/header.php';
  require_once '../database-connector.php';

  $id = $_GET['user_id'];
  $select_status = "SELECT * FROM user_info WHERE id = $id";
  $edit_query = mysqli_query($db, $select_status);
  $after_assoc = mysqli_fetch_assoc($edit_query);
  $_SESSION['user_id'] = $id;
 ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Bios</a>
        <span class="breadcrumb-item active">Edit User</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Edit Users</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <div class="form-layout">
            <form action="user-update.php" method="POST">
              <div class="row mg-b-25">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?= $after_assoc['name']?>">
                  </div>
                </div><!-- col-6 -->
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $after_assoc['email']?>">
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

