<?php
require_once 'inc/header.php';

$user_trush_select = "SELECT * FROM user_info WHERE status = 2";
$user_trush_query = mysqli_query($db, $user_trush_select);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Users Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Users Trush</h3>
      <?php
      if (isset($_SESSION['delete_user'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['delete_user'];
            unset($_SESSION['delete_user']);
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
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>User Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($user_trush_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?= $value['name'];?></td>
              <td><?= $value['email'];?></td>
              <td>
                <img width="50" src="upload/<?= $value['profile_image']?>">
              </td>
              <td class="text-center">
                <?php
                if ($value['role'] == 1) {
                  echo "User";
                }
                else if ($value['role'] == 2) {
                  echo "Employee";
                }
                else{
                  echo "Admin";
                }
                ?>
              </td>
              <td>
                <a class="btn btn-success" href="user-restore.php?id=<?=$value['id']?>"></i> Restore</a>
                <button class="btn btn-danger userPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
  <!-- ########## END: MAIN PANEL ########## -->
  <script type="text/javascript">
    $('.userPermanentDelete').click(function(){
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
            window.location.href = 'user-permanent-delete.php?id='+id;
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
