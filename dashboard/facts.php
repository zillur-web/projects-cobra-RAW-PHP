<?php
require 'inc/header.php';

$facts_select = "SELECT * FROM facts WHERE status = 'active'";
$facts_query = mysqli_query($db, $facts_select);

$facts_count = "SELECT COUNT(*) as total FROM facts WHERE status = 'active'";
$facts_query_count = mysqli_query($db, $facts_count);
$facts_assoc = mysqli_fetch_assoc($facts_query_count);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">All Facts</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">All Facts</h3>
      <?php
        if (isset($_SESSION['FactsAddSucess'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['FactsAddSucess'];
              unset($_SESSION['FactsAddSucess']);
              ?>
            </span>
          </div>
          <?php
        }
      ?> 
      <div class="text-right">
        <?php if (!$facts_assoc['total'] > 0): ?>
          <a href="facts-add.php"><i class="fa fa-plus"></i> Add</a>
        <?php endif ?>
      </div>
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>SL</th>
            <th>Future Projects</th>
            <th>Active Projects</th>
            <th>Year Of Experience</th>
            <th>Total Clients</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($facts_query as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td><?= $value['future_projects'];?></td>
              <td><?= $value['active_projects'];?></td>
              <td><?= $value['year_experience'];?></td>
              <td><?= $value['clients'];?></td>
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
                <a class="btn btn-success" href="facts-edit.php?id=<?=$value['id']?>"><i class="far fa-edit"></i> Edit</a>
                <button class="btn btn-danger FactDelete" data-id="<?=$value['id']?>">Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
  $('.FactDelete').click(function(){
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
          window.location.href = 'facts-delete.php?id='+id;
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
