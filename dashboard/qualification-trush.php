<?php
require 'inc/header.php';
$qualifications_select = "SELECT * FROM qualifications WHERE status = 2";
$qualifications_query_data = mysqli_query($db, $qualifications_select);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Qualifications Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Qualifications Trush</h3>
      <?php
      if (isset($_SESSION['qualificationDeleteSuccess'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['qualificationDeleteSuccess'];
            unset($_SESSION['qualificationDeleteSuccess']);
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
            <th>Passing Year</th>
            <th>Result</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($qualifications_query_data as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?= $value['title'];?></td>
              <td><?= $value['year'];?></td>
              <td><?= $value['result'].' %';?></td>
              <td><?= $value['status'];?></td>
              <td>
                <a class="btn btn-success" href="qualification-restore.php?id=<?= $value['id']?>" > Restore</a>
                <button class="btn btn-danger qualificationPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
   </div><!-- sl-page-title -->

 </div><!-- sl-pagebody -->
 <!-- ########## END: MAIN PANEL ########## -->
 <script type="text/javascript">
  $('.qualificationPermanentDelete').click(function(){
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
          window.location.href = 'qualification-permanent-delete.php?id='+id;
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
