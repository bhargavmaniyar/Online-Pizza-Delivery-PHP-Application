<?php  session_start();
include 'controller/db_conn.php';
?>
<!doctype html>
<html class="fuelux" lang="en">

<!-- Mirrored from creativico.com/envato/simplicity/smart-forms.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 24 Feb 2014 15:51:35 GMT -->
  
<head>
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/alertify.css" rel="stylesheet">

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
.main_container{
    margin-left: 0px !important;
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

        <h3>List of Items</h3>

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

          <!-- Form Elements Start -->
    
          <!-- Example Smart Form Start -->
          <div class="main_container" id="tables_page">
			
         
		<div class="row-fluid">
          <div class="widget widget-padding span12">
            <div class="widget-header">
              <i class="icon-group"></i>
              <h5>Items</h5>
              <div class="widget-buttons">
                  <b>Total : </b>Rs.<span id="ttl"></span>
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>  
            <div class="widget-body">
              <table id="users" class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                    <th>Sr no.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Subcat</th>
                    
                    <th>Extra Toppings</th>
                    <th>Size</th>
                    <th>Price</th>
                    
                    
                    
                  </tr>
                </thead>
                <tbody>
                    
<?php
$id=$_GET['id'];
$qry="select * from  order_item o,item i,item_size tz ,sub_category s,category c,size sz where tz.item_id=o.item_id and o.size_id=tz.size_id and sz.id=tz.size_id and o.item_id=i.id and i.subcat_id=s.id and s.cat_id=c.id and o.order_id=$id";

 $result= mysqli_query($con,$qry);
 $i=1;
 $total=0;
 
 while($row= mysqli_fetch_array($result))
 {
     $p=$row['price'];
       $q="SELECT * FROM order_ingr oi, ingredient i WHERE oi.ing_id=i.id and  oi.ordit_id=$row[0]";
       
     $rslt= mysqli_query($con,$q);
     
      ?>              
            <tr>
                    <td><?php echo $i++ ?></td>
                    <td><img src="images/<?php echo $row['img'] ?>" width="100px" height="100px"></td>
                    
                    <td><?php echo $row[6] ?></td>
                    
                    <td><?php echo $row[21] ?></td>
                    <td><?php echo $row[17] ?></td>
                    
                    <td>
  <?php while($rq=  mysqli_fetch_array($rslt))
  {
                      echo "<li style='margin-left:10px'>".$rq[1];
                      $p=$p+$rq['price'];
  }?>
                        </td>
                    
                        
                        
                    
                        <td>
                      <?php echo $row['name'] ?>
                    </td>
                    <td>
                      <?php echo $p ?>
                    </td>
                  </tr>
 <?php 
 $total=$total + $p;
 } ?>
                </tbody>
              </table>
            </div> <!-- /widget-body -->
          </div> <!-- /widget -->
        </div> <!-- /row-fluid -->

		</div>
          <!-- Example Smart Form End -->

        </div>

    </div>
  </div>
      
</div>
</div>

</section>
        <script src="assets/js/jquery.min.js"></script>

 <script type="text/javascript" src="assets/js/realm.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script> 
</body>
<script>
$("#upitem").addClass("active");
$("#upitem").parent().addClass("open");
$("#upitem").parent().parent().addClass("active");
$("#ttl").html('<?php echo $total ?>');
    </script>


</html>