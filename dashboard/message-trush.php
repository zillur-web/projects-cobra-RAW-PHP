<?php
require 'inc/header.php';
$message_select = "SELECT * FROM contacts WHERE status = 3";
$message_query = mysqli_query($db, $message_select);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Message Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Message Trush</h3>
      <?php
      if (isset($_SESSION['ContactsRestoreSuccess'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['ContactsRestoreSuccess'];
            unset($_SESSION['ContactsRestoreSuccess']);
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
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($message_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?=$value['name']?></td>
              <td><?=$value['email']?></td>
              <td style="width: 450px;"><?=$value['message']?></td>
              <td>
                <a class="btn btn-success" href="message-restore.php?id=<?= $value['id']?>" > Restore</a>
                <button class="btn btn-danger messagePermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
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
  $('.messagePermanentDelete').click(function(){
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
          window.location.href = 'message-permanent-delete.php?id='+id;
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
