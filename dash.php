<?php  session_start();?>
<!doctype html>
<html class="fuelux" lang="en">

<!-- Mirrored from creativico.com/envato/simplicity/smart-forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 24 Feb 2014 15:51:35 GMT -->
  
<head>
<style>
.col-lg-6{
	 width:400px;
	 margin-left:200px;
	 
	}
.notification{
	margin-left:150px;
	height:40px;
	margin-top:3px;
	padding:0px;
	text-align:left;
    width:313px;
}
</style>
<?php  include('cssjs.php');?>
</head>

<body>

<section class="content">

  <!-- Sidebar Start -->
  <?php  include('sidebar.php');?>
  <!-- Sidebar End -->

<div class="content-liquid-full">
<div class="container">

  <!-- Header Bar Start -->
  <?php  include('header.php');?>
  <!-- Header Bar End -->

  <!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <ul class="breadcrumbs">
             </ul>
          </div>

        </div>
  <!-- Breadcrumbs End -->

  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        

        <!-- Row Start -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3>Welcome to Branch  <i> <?=$_SESSION['branch_name'] ?></i> </h3>
          <!-- First Box Start -->
          <!-- First Box End -->

          <!-- Second Box Start -->
            
          <!-- Second Box End -->

          </div>
        </div>
        <!-- Row End -->

       

    </div>
  </div>
      
</div>
</div>

</section>

</body>


</html>