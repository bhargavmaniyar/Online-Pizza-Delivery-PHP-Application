<?php  session_start();?>

<html class="fuelux" lang="en">
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

        <h3>Change Password</h3>

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

                  <form action="controller/c_employee.php" method="post" class="basic-form" >
					<input type="hidden" id="act" name="act" value="p"/>
                                        
                  <div class="row">
                  <div class="col-md-12">
                    <label>Old Password</label>
                    <input type="password" id="old" name="old" placeholder="Old Password" required />
                    
                  </div>

                      <div class="col-md-12">
                    <label>New Password</label>
                    <input type="password" id="new1" name="new" placeholder="New Password" required />
                    
                  </div>
                      <div class="col-md-12">
                    <label>Re-type New Password</label>
                    <input type="password" id="new2"  placeholder="Re-type New Password" required />
                    
                  </div>

                  </div>

                 


                  
                  
                  <div class="row">
                    <div class="col-md-6 text-left">
                        <button id="btn" type="submit" onclick="return vr()" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Done</button><br>
                      
                    </div>
                  <?php
                  if(isset($_SESSION['status']))
                  {
                     if($_SESSION['status']=="1")
                     {
                  
                  ?>
                      <div class="notification notification-success">

            <strong>Successfully changed.</strong>
          </div>
                  <?php }
                  else
                  {
                  ?>    
                         <div class="notification notification-error">

            <strong>Old password is incorrect.</strong>
          </div>
                  <?php }
                  unset($_SESSION['status']);
                  
                  }
                        
                  ?>
                      <div class="notification notification-error" id="xc" style="display: none;padding-top: 10px">

                          <strong style="margin-left: -40px;">New passsword doesn't match</strong>
          </div>
                      
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

if(isset($_SESSION['ecat']))
{
    $row = $_SESSION['ecat'];

?>
<script type="text/javascript">
    alert("DA");
    alert("<?php echo $row[1] ?>");
    $("#name").val("<?php echo $row[1] ?>");
    $("#desc").val("<?php echo $row[2] ?>");
    $("#id").val("<?php echo $row[0] ?>");
    $("#act").val("u");
    $("#btn").html("<i class='fa fa-check'></i> Update");
    
    
    
    </script>

<?php }
 unset($_SESSION['ecat']);
?>

<script>
    function vr()
    {
        
       if($("#new1").val()==$("#new2").val())
       {
           return  true;
       }
      else
      {
          
          $("#xc").css("display","block");
         
          return false;
      }
    }
    </script>

</html>