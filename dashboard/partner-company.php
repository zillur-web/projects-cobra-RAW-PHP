<?php
require 'inc/header.php';

$partner_select = "SELECT * FROM partner WHERE status = 1";
$partner_query = mysqli_query($db, $partner_select);
// $partner_assoc = mysqli_fetch_assoc($partner_query);

$id = $_GET['id'];


?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">All Portfolio</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">All Portfolio</h3>
      <?php
        if (isset($_SESSION['PartnerUpdateSuccess'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['PartnerUpdateSuccess'];
              unset($_SESSION['PartnerUpdateSuccess']);
              ?>
            </span>
          </div>
          <?php
        }
        if (isset($_SESSION['PartnerEditSuccess'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['PartnerEditSuccess'];
              unset($_SESSION['PartnerEditSuccess']);
              ?>
            </span>
          </div>
          <?php
        } 
        if (isset($_SESSION['partner_delete'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['partner_delete'];
              unset($_SESSION['partner_delete']);
              ?>
            </span>
          </div>
          <?php
        }
      ?> 
      <div class="text-right">
          <a href="partner-company-add.php"><i class="fa fa-plus"></i> Add</a>
      </div>
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
                   echo "Active";
                  }
                  else{
                    echo "Deactive";
                  }
                ?>
              </td>
              <td>
                <a class="btn btn-success" href="partner-company-edit.php?id=<?=$value['id']?>" >Edit</a>
                <button class="btn btn-danger PartnerDelete" data-id="<?=$value['id']?>">Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
  $('.PartnerDelete').click(function(){
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
          window.location.href = 'partner-delete.php?id='+id;
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
