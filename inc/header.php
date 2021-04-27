<?php
require_once 'database-connector.php';
session_start();
$role_select = "SELECT * FROM user_info WHERE role = 3";
$role_query = mysqli_query($db, $role_select);
$role_assoc = mysqli_fetch_assoc($role_query);
$id = $role_assoc['id'];
$author_name_select = "SELECT * FROM user_info WHERE id = $id";
$author_name_query = mysqli_query($db, $author_name_select);
$author_name_assoc = mysqli_fetch_assoc($author_name_query);


$socials = "SELECT * FROM socials WHERE status = 'active'";
$social_query = mysqli_query($db, $socials);

$services = "SELECT * FROM services WHERE status = 'active'";
$services_query = mysqli_query($db, $services);

$settings = "SELECT * FROM settings WHERE status = 'active'";
$settings_query = mysqli_query($db, $settings);
$settings_assoc = mysqli_fetch_assoc($settings_query);

$qualification = "SELECT * FROM qualifications WHERE status=1 ORDER BY year DESC ";
$qualification_query = mysqli_query($db, $qualification);

$portfolio = "SELECT * FROM portfolio WHERE status = 'active' limit 9";
$portfolio_query = mysqli_query($db, $portfolio);

$partner = "SELECT * FROM partner WHERE status = 1";
$partner_query = mysqli_query($db, $partner);

$quotes_select = "SELECT * FROM clint_quotes WHERE status = 'active'";
$quotes_query = mysqli_query($db, $quotes_select);

$facts_select = "SELECT * FROM facts WHERE status = 'active'";
$facts_query = mysqli_query($db, $facts_select);
$facts_assoc = mysqli_fetch_assoc($facts_query);
?>

<!doctype html>

<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bios</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="front/assets/img/logo/Bios.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="front/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="front/assets/css/animate.min.css">
    <link rel="stylesheet" href="front/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="front/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="front/assets/css/flaticon.css">
    <link rel="stylesheet" href="front/assets/css/slick.css">
    <link rel="stylesheet" href="front/assets/css/aos.css">
    <link rel="stylesheet" href="front/assets/css/default.css">
    <link rel="stylesheet" href="front/assets/css/style.css">
    <link rel="stylesheet" href="front/assets/css/responsive.css">


    
</head>
<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.php" class="navbar-brand logo-sticky-none"><img style="width: 180px;height: 105px;margin: -23px 0px;padding: 0;" src="dashboard/upload/logo/<?= $settings_assoc['logo']?>" alt="Logo"></a>
                                <a href="index.php" class="navbar-brand s-logo-none"><img style="width: 170px;height: 90px;margin: -23px 0px;padding: 0;" src="dashboard/upload/logo/<?= $settings_assoc['logo']?>" alt="Logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarNav">
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                                <span class="navbar-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link" href="index.php#home">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php#about">about</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php#service">service</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php#portfolio">portfolio</a></li>
                                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                                </ul>
                            </div>
                            <div class="header-btn">
                                <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- offcanvas-start -->
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <div class="logo-side mb-30">
            <a href="index.php">
                <img style="width: 150px;" src="dashboard/upload/logo/<?= $settings_assoc['logo']?>" alt="Logo Here"/>
            </a>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p><?=$settings_assoc['office_address']?></p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p><?=$settings_assoc['phone']?></p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p><?=$settings_assoc['email']?></p>
            </div>
        </div>
        <div class="social-icon-right mt-20">
            <?php
            foreach ($social_query as $key => $value) { ?>
                <a  target="_blank" href="<?= $value['link']?>"><i class="<?= $value['icon']?>"></i></a>
            <?php }
            ?>
        </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- offcanvas-end -->
</header>
<!-- header-end -->