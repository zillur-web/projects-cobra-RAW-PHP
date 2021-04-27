<?php
require 'inc/header.php';
$facts_select = "SELECT * FROM facts WHERE status = 'deactive'";
$facts_query = mysqli_query($db, $facts_select);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Facts Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Facts Trush</h3>
      <?php
      if (isset($_SESSION['FactsDeleteSuccess'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['FactsDeleteSuccess'];
            unset($_SESSION['FactsDeleteSuccess']);
            ?>
          </span>
        </div>
        <?php
      }
      ?>  
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>SL</th>
            <th>Future Projects</th>
            <th>Active Projects</th>
            <th>Year Of Experience</th>
            <th>Total Clients</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($facts_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?= $value['future_projects'];?></td>
              <td><?= $value['active_projects'];?></td>
              <td><?= $value['year_experience'];?></td>
              <td><?= $value['clients'];?></td>
              <td><?= $value['status'];?></td>
              <td>
                <a class="btn btn-success" href="facts-restore.php?id=<?=$value['id']?>" >Restore</a>
                <button class="btn btn-danger factsPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </table>
  </div><!-- sl-page-title -->

</div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
  //Message Delete
  $('.factsPermanentDelete').click(function(){
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
          window.location.href = 'facts-permanent-delete.php?id='+id;
        }, 3000)
      } 
      else {
        swal("Your data is safe!");
      }
    });

  });
</script>


<?php
require 'inc/footer.php';
?>
