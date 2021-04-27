<?php
require 'inc/header.php';
$social_select = "SELECT * FROM socials WHERE status = 'active'";
$social_query_data = mysqli_query($db, $social_select);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">All Socials Link</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">All Socials Link</h3>
      <?php
      if (isset($_SESSION['SocialUpdateSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['SocialUpdateSucess'];
            unset($_SESSION['SocialUpdateSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['SocialEditSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['SocialEditSucess'];
            unset($_SESSION['SocialEditSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['social_delete'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['social_delete'];
            unset($_SESSION['social_delete']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 
      <div class="text-right">
        <a href="social-add.php"><i class="fa fa-plus"></i> Add</a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Icon</th>
            <th>Link</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($social_query_data as $keys => $value) {
              ?>
                <tr>
                  <td><?= ++$keys; ?></td>
                  <td><?= $value['name'];?></td>
                  <td><i class="<?= $value['icon'];?>"></i></td>
                  <td><?= $value['link'];?></td>
                  <td><?= $value['status'];?></td>
                  <td>
                    <a  class="btn btn-success" href="social-edit.php?id=<?=$value['id']?>">Edit</a>
                    <button class="btn btn-danger SocialDelete" data-id="<?=$value['id']?>">Delete</button>
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
  $('.SocialDelete').click(function(){
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
          window.location.href = 'social-delete.php?id='+id;
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
