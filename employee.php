<?php  session_start();

if(!isset($_SESSION['ddcntry']))
{
    
    header("location: controller/c_country.php?act=s&page=employee.php");
}
?>
<!doctype html>
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

        <h3>Add City</h3>

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
					<input type="hidden" id="act" name="act" value="i"/>
                                        <input type="hidden" id="id" name="id"/>
                                        
                                        
                  <div class="row">
                  <div class="col-md-12">
                      <label>Country:</label>
                                        
                                        <select id="dropdown" name="ctrid">
                    <option selected="selected">Select Country</option>
                <?=$_SESSION['ddcntry']  ?>
                  </select>
                  </div>

                  </div>
                  
                                        <div class="row">
                  <div class="col-md-12">
                      <label>State:</label>
                                        
                                        <select id="dropdown1" name="stateid">
                    <option selected="selected">Select State</option>
                
                  </select>
                  </div>

                  </div>
                  <div class="row">
                  <div class="col-md-12">
                      <label>City:</label>
                                        
                                        <select id="dropdown2" name="cityid">
                    <option selected="selected">Select City</option>
                
                  </select>
                  </div>

                  </div>
                  
                                        <div class="row">
                  <div class="col-md-12">
                      <label>Branch:</label>
                                        
                                        <select id="dropdown3" name="brid">
                    <option selected="selected">Select Branch</option>
                
                  </select>
                  </div>

                  </div>
                  
                  <div class="row">
                  <div class="col-md-6">
                    <label>First Name:</label>
                    <input type="text" id="fname" name="fname" placeholder="First Name" />
                    
                  </div>
                   <div class="col-md-6">
                    <label>Last Name:</label>
                    <input type="text" id="lname" name="lname" placeholder="Last Name" />
                    
                  </div>

                  </div>

                  <div class="row">
                  <div class="col-md-12">
                    <label>Email:</label>
                    <input type="Email" id="email" name="email" placeholder="Email" />
                    
                  </div>

                  </div>
                                        <div class="row">
                  <div class="col-md-12">
                    <label>Contact No:</label>
                    <input type="text" id="contact" name="contact" placeholder="Contact No" />
                    
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
<script>
    
    function ch2(a)
    {
        
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
             
              $("#dropdown3").html(xmlhttp.responseText);
              <?php
              if(isset($_SESSION['eemployee']))
              {
                  $row = $_SESSION['eemployee'];
              
             ?>
                             
              $("#dropdown3").val("<?=$row["br_id"]?>"); 
              
              <?php }?> 
              
          }
        }
        
xmlhttp.open("GET","controller/c_branch.php?act=s&cityid="+a.value,true);
xmlhttp.send();
        
        
        
        }
    
    function ch(a)
    {
        
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
             
              $("#dropdown1").html(xmlhttp.responseText);
              <?php
              if(isset($_SESSION['eemployee']))
              {
                  $row = $_SESSION['eemployee'];
              
             ?>
                             
              $("#dropdown1").val("<?=$row["state_id"]?>"); 
              ch1(document.getElementById("dropdown1"));
              <?php }?> 
              
          }
        }
        
xmlhttp.open("GET","controller/c_state.php?act=s&ctrid="+a.value,true);
xmlhttp.send();
        
        
        }
        
        function ch1(a)
    {
        
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
              
              
              $("#dropdown2").html(xmlhttp.responseText);
              <?php
              if(isset($_SESSION['eemployee']))
              {
                  
                  $row = $_SESSION['eemployee'];
             ?>
               
              $("#dropdown2").val("<?=$row["city_id"]?>"); 
                   ch2(document.getElementById("dropdown2"));
         
              <?php }?> 
              
          }
        }
        
xmlhttp.open("GET","controller/c_city.php?act=s&stateid="+a.value,true);
xmlhttp.send();
        
        
        }
        
        
    $("#dropdown").change(function(){
    ch(this);    
    });
    
    $("#dropdown1").change(function(){
    ch1(this);    
    });
    $("#dropdown2").change(function(){
    ch2(this);    
    });
 </script>
<?php

if(isset($_SESSION['eemployee']))
{
    $row = $_SESSION['eemployee'];

?>
<script type="text/javascript">
    
    $("#dropdown").val("<?=$row["cntry_id"]?>");
    
    
    ch(document.getElementById("dropdown"));
    $("#id").val("<?php echo $row[0] ?>");
    $("#fname").val("<?php echo $row[1] ?>");
    $("#lname").val("<?php echo $row[2] ?>");
    $("#email").val("<?php echo $row[5] ?>");
    $("#contact").val("<?php echo $row[3] ?>");
    $("#act").val("u");
    $("#btn").html("<i class='fa fa-check'></i> Update");
</script>

<?php
unset($_SESSION['eemployee']);


}
 
?>


<script>
$("#employee").addClass("active");
$("#employee").parent().addClass("open");
$("#employee").parent().parent().addClass("active");
    </script>
</html>