<?php
require 'inc/header.php';
$settings_select = "SELECT * FROM settings WHERE status = 'deactive'";
$settings_query_data = mysqli_query($db, $settings_select);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Settings Trush</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">Settings Trush</h3>
      <?php
      if (isset($_SESSION['settingsDeleteSuccess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['settingsDeleteSuccess'];
            unset($_SESSION['settingsDeleteSuccess']);
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
            <th>Tag Line</th>
            <th>About</th>
            <th>Logo</th>
            <th>Office Address</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Copyright</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($settings_query_data as $keys => $value) {
            ?>
            <tr>
              <td><?= ++$keys; ?></td>
              <td><?= $value['tagline'];?></td>
              <td><?= $value['about'];?></td>
              <td>
               <img width="50" src="upload/logo/<?= $value['logo']?>">
             </td>
             <td><?= $value['office_address'];?></td>
             <td><?= $value['email'];?></td>
             <td><?= $value['phone'];?></td>
             <td><?= $value['copyright'];?></td>
             <td>
               <a class="btn btn-success" href="settings-restore.php?id=<?= $value['id']?>"> Restore</a>
               <button class="btn btn-danger settingsPermanentDelete" data-id="<?=$value['id']?>"><i class="fas fa-times"></i> Delete</button>
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
  $('.settingsPermanentDelete').click(function(){
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
          window.location.href = 'settings-permanent-delete.php?id='+id;
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
