<?php
require 'inc/header.php';
$services_select = "SELECT * FROM services WHERE status = 'deactive'";
$services_query_data = mysqli_query($db, $services_select);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Services Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Services Trush</h3>
      <?php
      if (isset($_SESSION['ServicesUpdateSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['ServicesUpdateSucess'];
            unset($_SESSION['ServicesUpdateSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['ServicesEditSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['ServicesEditSucess'];
            unset($_SESSION['ServicesEditSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Icon</th>
            <th style="width: 400px;">Summary</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($services_query_data as $keys => $value) {
            ?>
            <tr>
              <td><?= ++$keys; ?></td>
              <td><?= $value['title'];?></td>
              <td><i class="<?= $value['icon'];?>"></i></td>
              <td style="width: 400px;"><?= $value['summary'];?></td>
              <td><?= $value['status'];?></td>
              <td>
                <a  class="btn btn-success" href="services-restore.php?id=<?=$value['id']?>">Restore</a>
                <button class="btn btn-danger ServicePermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
              </td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
  <!-- ########## END: MAIN PANEL ########## -->
  <script type="text/javascript">
    $('.ServicePermanentDelete').click(function(){
      let id = $(this).attr("data-id");
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your data has been deleted!", {
            icon: "success",
          });
          window.setTimeout(function(){
            window.location.href = 'services-permanent-delete.php?id='+id;
          }, 3000)
        } 
        else {
          swal("Your data is safe!");
        }
      });

    })

  </script>

  <?php
  require 'inc/footer.php';
  ?>
