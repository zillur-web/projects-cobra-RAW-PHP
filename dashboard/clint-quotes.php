<?php
require 'inc/header.php';

$quotes_select = "SELECT * FROM clint_quotes  WHERE status = 'active'";
$quotes_query = mysqli_query($db, $quotes_select);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">All Clint Quotes</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">All Clint Quotes</h3>
      <?php
        if (isset($_SESSION['ClintQuoteAddSuccess'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['ClintQuoteAddSuccess'];
              unset($_SESSION['ClintQuoteAddSuccess']);
              ?>
            </span>
          </div>
          <?php
        }
        if (isset($_SESSION['QuotesDelete'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['QuotesDelete'];
              unset($_SESSION['QuotesDelete']);
              ?>
            </span>
          </div>
          <?php
        }
      ?> 
      <div class="text-right">
          <a href="clint-quotes-add.php"><i class="fa fa-plus"></i> Add</a>
      </div>
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
          <?php foreach ($quotes_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td style="width: 150px;"><?= $value['name'];?></td>
              <td style="width: 150px;"><?= $value['designation'];?></td>
              <td style="width: 300px;"><?= $value['quotes'];?></td>
              <td><img style="width: 50px; border-radius: 2px;" src="upload/quotes/<?= $value['image'];?>" alt="quotes"></td>
              <td><?= $value['status'];?></td>
              <td>
                <a class="btn btn-success" href="clint-quotes-edit.php?id=<?= $value['id']?>" >Edit</a>
                <button class="btn btn-danger ClintQuoteDelete" data-id="<?=$value['id']?>">Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
  $('.ClintQuoteDelete').click(function(){
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
          window.location.href = 'clint-quotes-delete.php?id='+id;
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
