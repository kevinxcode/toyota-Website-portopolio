<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>AGUNG TOYOTA BATAM</title>

 
  <link rel="shortcut icon" href="assets/favicon.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="login_css/css/bootstrap.min.css">
  <link rel="stylesheet" href="login_css/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="login_css/css/site.min.css">


  <!-- Page -->
  <link rel="stylesheet" href="login_css/css/pages/login.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="login_css/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="login_css/fonts/brand-icons/brand-icons.min.css">
  

  <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="assets/vendor/media-match/media.match.min.js"></script>
    <script src="assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  
</head>
<body class="page-login layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <div class="brand"><a href="../">
        <img class="brand-img" src="login_css/logo.png" width="60%" alt="..."></a>
        <h2 class="brand-text">AGUNG TOYOTA BATAM</h2>
		<?php  include 'notif.php';  ?>
      </div>
    
      <form method="post" action="control/login_admin.php">
        <div class="form-group">
          <label class="sr-only" for="inputName">Username</label>
          <input type="text" name="username" class="form-control" id="inputName" placeholder="Username">
        </div>
        
        <div class="form-group">
          <label class="sr-only" for="inputPassword">Password</label>
          <input type="password" name="password" class="form-control" id="inputPassword" name="password"
          placeholder="Password">
        </div>
        <div class="form-group clearfix">
          <div class="checkbox-custom checkbox-inline pull-left">
            <input type="checkbox" id="inputCheckbox" name="checkbox">
            <label for="inputCheckbox">Remember me</label>
          </div>
          <a class="pull-right" href="forgot-password.html">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-default btn-block">Sign in</button>
      </form>
    

      <footer class="page-copyright">
      
        <p>© 2020. AGUNG TOYOTA BATAM</p>
        
      </footer>
    </div>
  </div>
  <!-- End Page -->


  
 

  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>

</body>

</html>