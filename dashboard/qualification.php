<?php
require 'inc/header.php';

$qualification_select = "SELECT * FROM qualifications WHERE status = 1";
$qualification_query = mysqli_query($db, $qualification_select);

$qualifications_count = "SELECT COUNT(*) as total FROM qualifications";
$qualifications_query_count = mysqli_query($db, $qualifications_count);
$qualifications_assoc = mysqli_fetch_assoc($qualifications_query_count);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">All Qualification</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">All Qualification</h3>
      <?php
      if (isset($_SESSION['AddQualificationSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['AddQualificationSucess'];
            unset($_SESSION['AddQualificationSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['qualificationsRestoreSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['qualificationsRestoreSucess'];
            unset($_SESSION['qualificationsRestoreSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['EditQualificationSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['EditQualificationSucess'];
            unset($_SESSION['EditQualificationSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['EditQualificationErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['EditQualificationErr'];
            unset($_SESSION['EditQualificationErr']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['QualificationDelete'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['QualificationDelete'];
            unset($_SESSION['QualificationDelete']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['QualificationDeleteErr'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['QualificationDeleteErr'];
            unset($_SESSION['QualificationDeleteErr']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 
      <div class="text-right">
        <?php if ($qualifications_assoc['total'] < 4): ?>
          <a href="add-qualification.php"><i class="fa fa-plus"></i> Add</a>
        <?php endif ?>
        
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Passing Year</th>
            <th>Result</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($qualification_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?= $value['title'];?></td>
              <td><?= $value['year'];?></td>
              <td><?= $value['result'].' %';?></td>
              <td><?= $value['status'];?></td>
              <td>
                <a class="btn btn-success" href="edit-qualification.php?id=<?= $value['id']?>" >Edit</a>
                <button class="btn btn-danger QualificationDelete" data-id="<?=$value['id']?>">Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->


<?php
require 'inc/footer.php';
?>
