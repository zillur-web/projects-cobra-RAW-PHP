<?php
require 'inc/header.php';
$contacts_select = "SELECT * FROM contacts ORDER BY id DESC";
$contacts_query = mysqli_query($db, $contacts_select);

// $select = "SELECT * FROM contacts WHERE status = 3" ;
// $delete = mysqli_query($db, $select);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">All Message</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">All Message</h3> 
      <?php
      if (isset($_SESSION['ContactsRestoreSuccess'])) {
        ?>
        <div class="alert alert-success">
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
          <?php foreach ($contacts_query as $keys => $value): ?>
            <tr <?php if ($value['status'] == 1): ?>
            style="font-weight: 900;"
          <?php endif ?>
          <?php if ($value['status'] == 3): ?>
            style="display:none;"
          <?php endif ?>
          >
          <td><?=++$keys;?></td>
          <td><?=$value['name']?></td>
          <td><?=$value['email']?></td>
          <td style="width: 450px;"><?=$value['message']?></td>
          <td>
            <?php if ($value['status'] == 1): ?>
              <a class="btn btn-success" href="message-status.php?id=<?= $value['id']?>">Read</a>
              <?php else : ?>
                <a class="btn btn-secondary" href="message-status.php?id=<?= $value['id']?>">Unread</a>
              <?php endif ?>
              
              <!-- <a class="btn btn-danger MessageDelete" href="message-delete.php?id=<?= $value['id']?>">Delete</a> -->
              <button class="btn btn-danger MessageDelete" data-id="<?=$value['id']?>">Delete</button>
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
  $('.MessageDelete').click(function(){
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
          window.location.href = 'message-delete.php?id='+id;
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
