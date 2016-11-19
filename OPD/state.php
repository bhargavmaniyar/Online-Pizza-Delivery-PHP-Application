<?php  session_start();
if(!isset($_SESSION['ddcntry']))
{
    header("location: controller/c_country.php?act=s");
}
?>
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

        <h3>Add State</h3>

        <!-- Row Start -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <!-- First Box Start -->
          <!-- First Box End -->

          <!-- Second Box Start -->
            
          <!-- Second Box End -->

          </div>
        </div>
        <!-- Row End -->

        <div class="row">
          <!-- Form Elements Start -->
    
          <!-- Example Smart Form Start -->
          <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
            <div class="boxed" >

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Enter the following details.</h4>
                
              </div>
              <!-- Title Bar End -->

              <div class="inner no-radius">

                <form action="controller/c_state.php" method="post" class="basic-form" >
					<input type="hidden" id="act" name="act" value="i"/>
                                        <input type="hidden" id="id" name="id"/>
                                        
                                        
                  <div class="row">
                  <div class="col-md-12">
                      <label>Name:</label>
                                        
                                        <select id="dropdown" name="ctrid">
                    <option selected="selected">Select Country</option>
                <?=$_SESSION['ddcntry']  ?>
                  </select>
                  </div>

                  </div>
                      
                  <div class="row">
                  <div class="col-md-12">
                    <label>Name:</label>
                    <input type="text" id="name" name="name" placeholder="State Name" />
                    
                  </div>

                  </div>

                  <div class="row">
                  <div class="col-md-12">
                    <label >Description</label>
                    <textarea name="desc" id="desc" placeholder="Description"></textarea>
                  </div>
                  </div>


                  
                  
                  <div class="row">
                    <div class="col-md-6 text-left">
                      <button id="btn" type="submit" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Save</button><br>
                      
                    </div>
                  <?php
                  if(isset($_SESSION['status']))
                  {
                     if($_SESSION['status']=="1")
                     {
                  
                  ?>
                      <div class="notification notification-success">

            <strong>Added Successfully.</strong>
          </div>
                  <?php }
                  else
                  {
                  ?>    
                      <div class="notification notification-error">

            <strong>Already Exists.</strong>
          </div>
                  <?php }
                  unset($_SESSION['status']);
                  
                  }
                        
                  ?>
                      
                  </div>

                </form>

              </div>

            </div>
          </div>
          <!-- Example Smart Form End -->

        </div>

    </div>
  </div>
      
</div>
</div>

</section>

</body>

<?php

if(isset($_SESSION['estate']))
{
    $row = $_SESSION['estate'];

?>
<script type="text/javascript">
    $("#dropdown").val("<?=$row[3]?>");
    $("#name").val("<?php echo $row[1] ?>");
    $("#desc").val("<?php echo $row[2] ?>");
    $("#id").val("<?php echo $row[0] ?>");
    $("#act").val("u");
    $("#btn").html("<i class='fa fa-check'></i> Update");
</script>

<?php
unset($_SESSION['estate']);


}
 
?>
<script>
$("#addstate").addClass("active");
$("addstate").parent().addClass("open");
$("#addstate").parent().parent().addClass("active");
</script>
</html>
