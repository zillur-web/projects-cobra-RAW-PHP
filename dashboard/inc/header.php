<?php 
require_once 'session.php';
require_once '../database-connector.php';

$file_explode = explode('/', $_SERVER['PHP_SELF']);
$current_page_location = end($file_explode);

$user_session_id = $_SESSION['id'];
$user_select = "SELECT * FROM user_info WHERE id = '$user_session_id'";
$select_user_query = mysqli_query($db, $user_select);
$after_assoc_query = mysqli_fetch_assoc($select_user_query);

$contacts_select = "SELECT * FROM contacts WHERE status = 1 ORDER BY id DESC";
$contacts_query = mysqli_query($db, $contacts_select);
$contacts_count = mysqli_num_rows($contacts_query);

$user_trush_select = "SELECT * FROM user_info WHERE status = 2";
$user_trush_query = mysqli_query($db, $user_trush_select);
$user_trush_count = mysqli_num_rows($user_trush_query);

$socials_trush_select = "SELECT * FROM socials WHERE status = 'deactive'";
$socials_trush_query = mysqli_query($db, $socials_trush_select);
$socials_trush_count = mysqli_num_rows($socials_trush_query);

$services_trush_select = "SELECT * FROM services WHERE status = 'deactive'";
$services_trush_query = mysqli_query($db, $services_trush_select);
$services_trush_count = mysqli_num_rows($services_trush_query);

$settings_trush_select = "SELECT * FROM settings WHERE status = 'deactive'";
$settings_trush_query = mysqli_query($db, $settings_trush_select);
$settings_trush_count = mysqli_num_rows($settings_trush_query);

$qualification_trush_select = "SELECT * FROM qualifications WHERE status = 2";
$qualification_trush_query = mysqli_query($db, $qualification_trush_select);
$qualification_trush_count = mysqli_num_rows($qualification_trush_query);

$portfolio_trush_select = "SELECT * FROM portfolio WHERE status = 'deactive'";
$portfolio_trush_query = mysqli_query($db, $portfolio_trush_select);
$portfolio_trush_count = mysqli_num_rows($portfolio_trush_query);

$message_trush_select = "SELECT * FROM contacts WHERE status = 3";
$message_trush_query = mysqli_query($db, $message_trush_select);
$message_trush_count = mysqli_num_rows($message_trush_query);

$partner_trush_select = "SELECT * FROM partner WHERE status = 2";
$partner_trush_query = mysqli_query($db, $partner_trush_select);
$partner_trush_count = mysqli_num_rows($partner_trush_query);

$client_trush_select = "SELECT * FROM clint_quotes WHERE status = 'deactive'";
$client_trush_query = mysqli_query($db, $client_trush_select);
$client_trush_count = mysqli_num_rows($client_trush_query);

$facts_trush_select = "SELECT * FROM facts WHERE status = 'deactive'";
$facts_trush_query = mysqli_query($db, $facts_trush_select);
$facts_trush_count = mysqli_num_rows($facts_trush_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Twitter -->
  <meta name="twitter:site" content="@themepixels">
  <meta name="twitter:creator" content="@themepixels">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Starlight">
  <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

  <!-- Facebook -->
  <meta property="og:url" content="http://themepixels.me/starlight">
  <meta property="og:title" content="Starlight">
  <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

  <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="600">

  <!-- Meta -->
  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="ThemePixels">

  <title>Bios Admin Pannel</title>

  <!-- vendor css -->
  <!-- <link href="../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

  <link rel="stylesheet" href="../front/assets/css/fontawesome-all.min.css">
  <link href="../assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="../assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">


  <script src="../assets/lib/jquery/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



  <!-- Starlight CSS -->
  <link rel="stylesheet" href="../assets/css/starlight.css">

</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href="dashboard.php"><i class="icon ion-android-star-outline"></i> Bios</a></div>
  <div class="sl-sideleft">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href="../index.php" target="_blank" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fa fa-globe tx-22"></i>
          <span class="menu-item-label"><b>Live Preview</b></span>
        </div><!-- menu-item -->
      </a>
      <a href="dashboard.php" class="sl-menu-link <?= $current_page_location == 'dashboard.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
      </a>
      <!-- sl-menu-link -->
      <?php if ($after_assoc_query['role'] == 3): ?>
        <a href="user-list.php" class="sl-menu-link <?= $current_page_location == 'user-list.php' ? 'active' : ''?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-contact-outline tx-22"></i>
            <span class="menu-item-label">Users</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      <?php endif ?>
      <a href="social.php" class="sl-menu-link <?= $current_page_location == 'social.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fab fa-battle-net tx-22"></i>
          <span class="menu-item-label">All Socials</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="services.php" class="sl-menu-link <?= $current_page_location == 'services.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fab fa-react tx-22"></i>
          <span class="menu-item-label">Services</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="settings.php" class="sl-menu-link <?= $current_page_location == 'settings.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fas fa-tasks tx-22"></i>
          <span class="menu-item-label">Settings</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="qualification.php" class="sl-menu-link <?= $current_page_location == 'qualification.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fas fa-user-graduate tx-22"></i>
          <span class="menu-item-label">Qualification</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="portfolio.php" class="sl-menu-link <?= $current_page_location == 'portfolio.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fas fa-briefcase tx-22"></i>
          <span class="menu-item-label">Portfolios</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link --> 
      <?php if ($after_assoc_query['role'] == 3): ?>
        <a href="contacts.php" class="sl-menu-link <?= $current_page_location == 'contacts.php' ? 'active' : ''?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon far fa-envelope tx-22"></i>
            <span class="menu-item-label">Message (<?=$contacts_count?>)</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      <?php endif ?>
      <a href="partner-company.php" class="sl-menu-link <?= $current_page_location == 'partner-company.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon far fa-handshake tx-22 mr-1"></i>
          <span class="menu-item-label">Partner</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="clint-quotes.php" class="sl-menu-link <?= $current_page_location == 'clint-quotes.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon far fa-comments tx-22 mr-1"></i>
          <span class="menu-item-label">Client-Quotes</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="facts.php" class="sl-menu-link <?= $current_page_location == 'facts.php' ? 'active' : ''?>">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon fab fa-superpowers tx-22 mr-1"></i>
          <span class="menu-item-label">Facts</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <?php if ($after_assoc_query['role'] == 3): ?>
        <a href="" class="sl-menu-link <?php if($current_page_location=='user-trush.php' || $current_page_location=='social-trush.php' || $current_page_location=='services-trush.php' || $current_page_location=='settings-trush.php' || $current_page_location=='qualification-trush.php' || $current_page_location=='portfolio-trush.php' || $current_page_location=='message-trush.php' || $current_page_location=='partner-trush.php' || $current_page_location=='client-trush.php' || $current_page_location=='facts-trush.php'){echo 'active';} ?>">
          <div class="sl-menu-item">
            <i class="menu-item-icon far fa-trash-alt tx-20"></i>
            <span class="menu-item-label">Trash</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="user-trush.php" class="nav-link ">Users (<?=$user_trush_count;?>)</a></li>
          <li class="nav-item"><a href="social-trush.php" class="nav-link">Socials (<?=$socials_trush_count;?>)</a></li>
          <li class="nav-item"><a href="services-trush.php" class="nav-link">Services (<?=$services_trush_count;?>)</a></li>
          <li class="nav-item"><a href="settings-trush.php" class="nav-link">Settings (<?=$settings_trush_count;?>)</a></li>
          <li class="nav-item"><a href="qualification-trush.php" class="nav-link">Qualification (<?=$qualification_trush_count;?>)</a></li>
          <li class="nav-item"><a href="portfolio-trush.php" class="nav-link">Portfolios (<?=$portfolio_trush_count;?>)</a></li>
          <li class="nav-item"><a href="message-trush.php" class="nav-link">Messages (<?=$message_trush_count;?>)</a></li>
          <li class="nav-item"><a href="partner-trush.php" class="nav-link">Partner (<?=$partner_trush_count;?>)</a></li>
          <li class="nav-item"><a href="client-trush.php" class="nav-link">Client Quote (<?=$client_trush_count;?>)</a></li>
          <li class="nav-item"><a href="facts-trush.php" class="nav-link">Facts (<?=$facts_trush_count;?>)</a></li>
        </ul><!-- sl-menu-link -->
      <?php endif ?>
    </div><!-- sl-sideleft-menu -->

    <br>
  </div><!-- sl-sideleft -->
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <div class="sl-header">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name"><span class="hidden-md-down"><?= $_SESSION['name'];?></span></span>
            <img style="width: 35px; height: 35px;" src="upload/<?= $after_assoc_query['profile_image']?>" class="wd-32 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href="edit-profile.php"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href="change-password.php"><i class="icon fa fa-lock"></i> Change Password</a></li>
              <li><a href="../logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
      <?php if ($after_assoc_query['role'] == 3): ?>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <?php if ($contacts_count): ?>
              <span class="square-8 bg-danger"></span>
            <?php endif ?>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      <?php endif ?>
    </div><!-- sl-header-right -->
  </div><!-- sl-header -->
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  <div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (<?=$contacts_count?>)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (0)</a>
      </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">

        <div class="media-list">
          <?php 
          if ($contacts_count >0) {
            foreach ($contacts_query as $key => $message){ ?>
              <!-- loop starts here -->
              <a href="message-status.php?id=<?=$message['id']?>" class="media-list-link">
                <div class="media">
                  <!-- <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt=""> -->
                  <div class="media-body">
                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13"><?=$message['name']?></p>
                    <!-- <span class="d-block tx-11 tx-gray-500">2 minutes ago</span> -->
                    <p class="tx-13 mg-t-10 mg-b-0"><?=$message['message']?></p>
                  </div>
                </div><!-- media -->
              </a>
              <!-- loop ends here -->
              
            <?php }
          }
          else{
            echo "<p class='text-info text-center'>No Messages Available</p>";
          }
          ?>
        </div><!-- media-list -->
      </div><!-- #messages -->

      <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
        <div class="media-list">
          <span class="text-center text-danger">This Futures are not available</span>
          <!-- loop starts here -->
          <!-- <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                <span class="tx-12">October 03, 2017 8:45am</span>
              </div>
            </div>
          </a> -->
          <!-- loop ends here -->
        </div><!-- media-list -->
      </div><!-- #notifications -->

    </div><!-- tab-content -->
  </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->