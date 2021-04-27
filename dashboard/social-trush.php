<?php
require_once 'inc/header.php';

$socials_trush_select = "SELECT * FROM socials WHERE status = 'deactive'";
$socials_trush_query = mysqli_query($db, $socials_trush_select);



?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Socials Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Socials Trush</h3>
      <?php
      if (isset($_SESSION['socialDeleteSuccess'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['socialDeleteSuccess'];
            unset($_SESSION['socialDeleteSuccess']);
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
            <th>Icon</th>
            <th>link</th>
            <th>User Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($socials_trush_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?= $value['name'];?></td>
              <td><?= $value['icon'];?></td>
              <td><?= $value['link'];?></td>
              <td><?= $value['status'];?></td>
              <td>
                <a class="btn btn-success" href="socials-restore.php?id=<?=$value['id']?>"> Restore</a>
                <button class="btn btn-danger socialsPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
  <!-- ########## END: MAIN PANEL ########## -->
  <script type="text/javascript">
    $('.socialsPermanentDelete').click(function(){
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
            window.location.href = 'social-permanent-delete.php?id='+id;
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
