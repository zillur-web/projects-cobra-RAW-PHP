<?php
require 'inc/header.php';
$partner_select = "SELECT * FROM partner WHERE status = 2";
$partner_query = mysqli_query($db, $partner_select);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Partner Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Partner Trush</h3>
      <?php
      if (isset($_SESSION['PartnerDeleteSuccess'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['PartnerDeleteSuccess'];
            unset($_SESSION['PartnerDeleteSuccess']);
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
            <th>Company Name</th>
            <th>Company Logo</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($partner_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?= $value['company_name'];?></td>
              <td><img style="width: 50px; border-radius: 2px;" src="upload/partner-company/<?= $value['company_logo'];?>" alt=""></td>
              <td>
                <?php
                if ($value['status']) {
                 echo "Deactive";
               }
               else{
                echo "Active";
              }
              ?>
            </td>
            <td>
              <a class="btn btn-success" href="partner-restore.php?id=<?=$value['id']?>" >Restore</a>
              <button class="btn btn-danger partnerPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div><!-- sl-page-title -->

</div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
  //Message Delete
  $('.partnerPermanentDelete').click(function(){
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
          window.location.href = 'partner-permanent-delete.php?id='+id;
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
