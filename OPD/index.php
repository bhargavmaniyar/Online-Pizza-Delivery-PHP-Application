<?php session_start(); ?>
<!doctype html>
<html>

<!-- Mirrored from creativico.com/envato/simplicity/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 24 Feb 2014 15:50:54 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Yo!!! Pizza</title>

  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">

  <!-- Google Fonts -->
  
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->


</head>

<body class="login-page">

<section class="content login-page">

  <div class="content-liquid">
    <div class="container">

      <div class="row">

        <div class="login-page-container">

          <div class="boxed animated flipInY">
            <div class="inner">

              <div class="login-title text-center">
                <h4>Login to your account</h4>
                
              </div>
                <form action="controller/c_employee.php" method="post">
                    <input type="hidden" value="l" name="act"/>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" name="username" class="form-control" placeholder="username" required />
              </div>
                            

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="password" required/>
                
              </div>
                            <?php 
                            if(isset($_SESSION['ack']))
                            { ?>
<div class="input-group" style="height: 3px;margin-top: -3px;margin-left: 50px; color: darkred; font-size: smaller">
 Username or password is incorrect
 
              </div>
                            <?php 
 unset($_SESSION['ack']);
                            
                            } ?>
              <input type="submit" class="btn btn-lg btn-success" value="Login to your account" name="submit" id="submit" />
			</form>
              <p class="footer"><br/></p>

            </div>
          </div>

        </div>

      </div>
      
    </div>
  </div>

</section>

<!-- Javascript -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/flippy/jquery.flippy.min.html"></script>


<script type="text/javascript">
  jQuery(document).ready(function($){

    var min_height = jQuery(window).height();
    jQuery('div.login-page-container').css('min-height', min_height);
    jQuery('div.login-page-container').css('line-height', min_height + 'px');

    //$(".inner", ".boxed").fadeIn(500);
  });
</script>
</body>

<!-- Mirrored from creativico.com/envato/simplicity/login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 24 Feb 2014 15:51:02 GMT -->
</html>