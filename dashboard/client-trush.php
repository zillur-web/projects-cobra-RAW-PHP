<?php
require 'inc/header.php';
$client_select = "SELECT * FROM clint_quotes WHERE status = 'deactive'";
$client_query = mysqli_query($db, $client_select);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Client Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Client Trush</h3>
      <?php
      if (isset($_SESSION['ClientDeleteSuccess'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['ClientDeleteSuccess'];
            unset($_SESSION['ClientDeleteSuccess']);
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
            <th>Name</th>
            <th>Designation</th>
            <th>Quotes</th>
            <th>Client Image</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($client_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td style="width: 150px;"><?= $value['name'];?></td>
              <td style="width: 150px;"><?= $value['designation'];?></td>
              <td style="width: 300px;"><?= $value['quotes'];?></td>
              <td><img style="width: 50px; border-radius: 2px;" src="upload/quotes/<?= $value['image'];?>" alt="quotes"></td>
              <td><?= $value['status'];?></td>
              <td>
                <a class="btn btn-success" href="client-restore.php?id=<?=$value['id']?>" >Restore</a>
                <button class="btn btn-danger clientPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
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
  $('.clientPermanentDelete').click(function(){
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
          window.location.href = 'client-permanent-delete.php?id='+id;
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
