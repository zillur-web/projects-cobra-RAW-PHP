<?php
require 'inc/header.php';
$portfolio_select = "SELECT * FROM portfolio WHERE status = 'deactive'";
$portfolio_query_data = mysqli_query($db, $portfolio_select);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Portfolios Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Portfolios Trush</h3>
      <?php
      if (isset($_SESSION['portfolioDeleteSuccess'])) {
        ?>
        <div class="alert alert-danger">
          <span>
            <?php
            echo $_SESSION['portfolioDeleteSuccess'];
            unset($_SESSION['portfolioDeleteSuccess']);
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
                <a class="btn btn-success" href="portfolio-restore.php?id=<?= $value['id']?>" > Restore</a>
                <button class="btn btn-danger portfolioPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div><!-- sl-page-title -->

  </div><!-- sl-pagebody -->
  <!-- ########## END: MAIN PANEL ########## -->
  <script type="text/javascript">
    $('.portfolioPermanentDelete').click(function(){
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
            window.location.href = 'portfolio-permanent-delete.php?id='+id;
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
