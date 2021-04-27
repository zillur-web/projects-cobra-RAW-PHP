<?php
  require 'inc/header.php';
  $select = "SELECT * FROM user_info WHERE status = 1";
  $query_data = mysqli_query($db, $select);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">All Users</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
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
        if (isset($_SESSION['user_restore'])) {
          ?>
            <div class="alert alert-success">
              <span>
                <?php
                  echo $_SESSION['user_restore'];
                  unset($_SESSION['user_restore']);
                ?>
              </span>
            </div>
          <?php
        }
        if (isset($_SESSION['update_user'])) {
          ?>
            <div class="alert alert-success">
              <span>
                <?php
                  echo $_SESSION['update_user'];
                  unset($_SESSION['update_user']);
                ?>
              </span>
            </div>
          <?php
        }
      ?> 
      <table class="table table-bordered" id="myTable">
        <thead>
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>User Image</th>
            <th>User Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($query_data as $key => $value) {
              ?>
                <tr>
                  <td><?= ++$key ?></td>
                  <td><?= $value['name']?></td>
                  <td><?= $value['email']?></td>
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
                    <a  class="btn btn-success" href="user-edit.php?user_id=<?=$value['id']?>">Edit</a>
                    <button class="btn btn-danger UserDelete" data-id="<?=$value['id']?>">Delete</button>
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
  $('.UserDelete').click(function(){
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
          window.location.href = 'user-delete.php?user_id='+id;
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
