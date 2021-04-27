<?php
session_start();
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

    <title>Signup</title>

    <!-- vendor css -->
    <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="assets/lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="assets/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Bios <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        <form action="register-post.php" method="POST">
          <div class="form-group">
            <input type="text" class="form-control NameInputErr NameValidErr" id="name" placeholder="Enter Name" name="name">

            
            <span class="text-danger">
              <?php
              if (isset($_SESSION['NameInputErr'])) {
                  echo "<style>.NameInputErr{border:1px solid red;}</style>";
                  echo $_SESSION['NameInputErr'];
                  unset($_SESSION['NameInputErr']);
              }
              if (isset($_SESSION['NameValidErr'])) {
                  echo "<style>.NameValidErr{border:1px solid red;}</style>";
                  echo $_SESSION['NameValidErr'];
                  unset($_SESSION['NameValidErr']);
              }
              ?>
            </span>
          </div>
          <div class="form-group">
            <input type="email" class="form-control EmailInputErr EmailValidErr EmailFatchCheck" id="email" placeholder="Enter email" name="email">
            <span class="text-danger">
              <?php
              if (isset($_SESSION['EmailInputErr'])) {
                  echo "<style>.EmailInputErr{border:1px solid red;}</style>";
                  echo $_SESSION['EmailInputErr'];
                  unset($_SESSION['EmailInputErr']);
              }
              if (isset($_SESSION['EmailValidErr'])) {
                  echo "<style>.EmailValidErr{border:1px solid red;}</style>";
                  echo $_SESSION['EmailValidErr'];
                  unset($_SESSION['EmailValidErr']);
              }
              if (isset($_SESSION['EmailFatchCheck'])) {
                  echo "<style>.EmailFatchCheck{border:1px solid red;}</style>";
                  echo $_SESSION['EmailFatchCheck'];
                  unset($_SESSION['EmailFatchCheck']);
              }
              ?>
            </span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control PswdInputErr PswdValidErr" id="pwd" placeholder="Enter password" name="pswd">
            <span class="text-danger">
              <?php
              if (isset($_SESSION['PswdInputErr'])) {
                  echo "<style>.PswdInputErr{border:1px solid red;}</style>";
                  echo $_SESSION['PswdInputErr'];
                  unset($_SESSION['PswdInputErr']);
              }
              if (isset($_SESSION['PswdValidErr'])) {
                  echo "<style>.PswdValidErr{border:1px solid red;}</style>";
                  echo $_SESSION['PswdValidErr'];
                  unset($_SESSION['PswdValidErr']);
              }
              ?>
            </span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control CpswdInputErr CpswdMatchErr" id="Cpwd" placeholder="Enter confirm password" name="Cpswd">
            <span class="text-danger">
              <?php
              if (isset($_SESSION['CpswdInputErr'])) {
                  echo "<style>.CpswdInputErr{border:1px solid red;}</style>";
                  echo $_SESSION['CpswdInputErr'];
                  unset($_SESSION['CpswdInputErr']);
              }
              if (isset($_SESSION['CpswdMatchErr'])) {
                  echo "<style>.CpswdMatchErr{border:1px solid red;}</style>";
                  echo $_SESSION['CpswdMatchErr'];
                  unset($_SESSION['CpswdMatchErr']);
              }
              ?>
            </span>
          </div>
          <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
          <button type="submit" class="btn btn-info btn-block">Sign Up</button>

          <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign In</a></div>
        </form>
        
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="assets/lib/jquery/jquery.js"></script>
    <script src="assets/lib/popper.js/popper.js"></script>
    <script src="assets/lib/bootstrap/bootstrap.js"></script>
    <script src="assets/lib/select2/js/select2.min.js"></script>

  </body>
</html>




