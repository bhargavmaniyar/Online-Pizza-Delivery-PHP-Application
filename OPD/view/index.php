<?php session_start();
if(!isset($_SESSION['ddcntry']))
{
    
    header("location: ../controller/c_country.php?act=s&page=view/index.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Online</title>
<link rel="stylesheet" href="style/index.css" />
  <script src="js/jquery.min.js"></script>

</head>

<body>
<div class="main">
    <div class="first" style="background: lightgray;float: left;margin-top: 50px; margin-left: 150px; border: 2px solid graytext; box-shadow:10px 10px 5px #888888; border-bottom-right-radius: 1010px;">;
<div class="cotact_form" style="clear:left;float: left;width: 250px " >
    <div class="form_head">First time order??</div>
    <form action="../controller/c_cookie.php" method="post">
        <select name="cntry" id="cntry" required>
        
        <option>Select Country</option>
        <?=$_SESSION['ddcntry']  ?>
        
    </select>
    <select name="state" id="state">
        <option>Select State</option>
        
    </select>
    <select name="city" id="city">
        <option>Select City</option>
        
    </select>
    <select name="branch" id="branch">
        <option>Select Branch</option>
        
    </select>
    
        
    <input type="submit" class="submit" value="Build Your Order" style="width: 150px; margin-top: 10px;border-radius: 100px;">
    </form>
 </div>
        <div style="width: 2px;height: 280px;background: black;float: left; margin-top: 40px;margin-left: 10px;">
            
        </div>
<div class="cotact_form" style="float: left;width: 250px;margin-left: 10px " >
    <div class="form_head">Ordered Before?</div>
    <form action="../controller/c_cookie.php" method="post">
        <input type="hidden" name="login" value="1"/>
 	<input type="text" name="mobile" placeholder="Mobile" required /><br/>
    <input type="password" name="password" placeholder="password" required />
    <?php  if(isset($_SESSION['status'])){ ?> <div>Invalid Contace no. or Password</div>
    <?php
 unset($_SESSION['status']);
 
} ?>
    <input type="submit" class="submit" style="width: 100px; margin-top: 10px;border-radius: 100px;">
    </form>
 </div>
      
</div>
    <div class="second" style="float: left;">
        <img class="back_img" src="images/default-banner.jpg" style="width: 400px" /> 
</div>
</div>
</body>
<script>
    function ch(a)
    {
        
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
              
              $("#state").html(xmlhttp.responseText);
              
          }
        }
        
xmlhttp.open("GET","../controller/c_state.php?act=s&ctrid="+a.value,true);
xmlhttp.send();
        
        
        }
        
        function ch1(a)
    {
        
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
              
              
              $("#city").html(xmlhttp.responseText);
               
              
          }
        }
        
xmlhttp.open("GET","../controller/c_city.php?act=s&stateid="+a.value,true);
xmlhttp.send();
        
        
        }
        
        
        function ch2(a)
    {
        
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
          if(xmlhttp.readyState==4 && xmlhttp.status==200)
          {
              
              
              $("#branch").html(xmlhttp.responseText);
               
              
          }
        }
        
xmlhttp.open("GET","../controller/c_branch.php?act=s&cityid="+a.value,true);
xmlhttp.send();
        
        
        }
    
        $("#cntry").change(function(){

        ch(this);    
    });
    
    $("#state").change(function(){
    ch1(this);    
    });
    
    $("#city").change(function(){
    ch2(this);    
    });

</script>
</html>
