<?php
require 'inc/header.php';
$settings_select = "SELECT * FROM settings WHERE status = 'active'";
$settings_query_data = mysqli_query($db, $settings_select);

$settings_count = "SELECT COUNT(*) as total FROM settings WHERE status = 'active'";
$settings_query_count = mysqli_query($db, $settings_count);
$settings_assoc = mysqli_fetch_assoc($settings_query_count);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="dashboard.php">Bios</a>
    <span class="breadcrumb-item active">Settings</span>
  </nav>
  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h3 class="text-center">System Settings</h3>
      <?php
      if (isset($_SESSION['SettingsAddSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['SettingsAddSucess'];
            unset($_SESSION['SettingsAddSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['SettingsRestoreSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['SettingsRestoreSucess'];
            unset($_SESSION['SettingsRestoreSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['SettingsUpdateSucess'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['SettingsUpdateSucess'];
            unset($_SESSION['SettingsUpdateSucess']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['settings_delete'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['settings_delete'];
            unset($_SESSION['settings_delete']);
            ?>
          </span>
        </div>
        <?php
      }
      if (isset($_SESSION['settings_delete_success'])) {
        ?>
        <div class="alert alert-success">
          <span>
            <?php
            echo $_SESSION['settings_delete_success'];
            unset($_SESSION['settings_delete_success']);
            ?>
          </span>
        </div>
        <?php
      }
      ?> 
      <div class="text-right">
      	<?php if (!$settings_assoc['total'] > 0): ?>
      		<a href="add-settings.php"><i class="fa fa-plus"></i> Add</a>
      	<?php endif ?>
      </div>
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
               <a class="btn btn-success" href="edit-settings.php?id=<?= $value['id']?>"><i class="far fa-edit"></i> Edit</a>
               <button class="btn btn-danger SettingsDelete" data-id="<?=$value['id']?>">Delete</button>
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
  $('.SettingsDelete').click(function(){
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
          window.location.href = 'settings-delete.php?id='+id;
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
