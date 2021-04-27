<?php
require 'inc/header.php';

$portfolio_select = "SELECT * FROM portfolio  WHERE status = 'active'";
$portfolio_query_data = mysqli_query($db, $portfolio_select);

$portfolio_count = "SELECT COUNT(*) as total FROM portfolio";
$portfolio_query_count = mysqli_query($db, $portfolio_count);
$portfolio_after_assoc = mysqli_fetch_assoc($portfolio_query_count);

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
        if (isset($_SESSION['PortfolioUpdateSuccess'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['PortfolioUpdateSuccess'];
              unset($_SESSION['PortfolioUpdateSuccess']);
              ?>
            </span>
          </div>
          <?php
        }
        if (isset($_SESSION['PortfolioEditSuccess'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['PortfolioEditSuccess'];
              unset($_SESSION['PortfolioEditSuccess']);
              ?>
            </span>
          </div>
          <?php
        }
        if (isset($_SESSION['PortfolioUpdateErr'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['PortfolioUpdateErr'];
              unset($_SESSION['PortfolioUpdateErr']);
              ?>
            </span>
          </div>
          <?php
        }
        if (isset($_SESSION['portfolio_delete'])) {
          ?>
          <div class="alert alert-success">
            <span>
              <?php
              echo $_SESSION['portfolio_delete'];
              unset($_SESSION['portfolio_delete']);
              ?>
            </span>
          </div>
          <?php
        }
      ?> 
      <div class="text-right">
        <?php if ($portfolio_after_assoc['total'] < 10): ?>
          <a href="add-portfolios.php"><i class="fa fa-plus"></i> Add</a>
        <?php endif ?>
        
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Category</th>
            <th>Summary</th>
            <th>Thumbnail</th>
            <th>Featured Image</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($portfolio_query_data as $keys => $value): ?>
            <tr>
              <td><?=++$keys;?></td>
              <td style="width: 150px;"><?= $value['title'];?></td>
              <td style="width: 150px;"><?= $value['category'];?></td>
              <td style="width: 300px;"><?= $value['summary'];?></td>
              <td><img style="width: 50px; border-radius: 2px;" src="upload/thumbnail/<?= $value['thumbnail'];?>" alt=""></td>
              <td><img style="width: 50px; border-radius: 2px;" src="upload/featured_image/<?= $value['featured_image'];?>" alt=""></td>
              <td><?= $value['status'];?></td>
              <td>
                <a class="btn btn-success" href="portfolio-edit.php?id=<?= $value['id']?>" >Edit</a>
                <button class="btn btn-danger portfoliosDelete" data-id="<?=$value['id']?>">Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
  $('.portfoliosDelete').click(function(){
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
          window.location.href = 'portfolios-delete.php?id='+id;
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
