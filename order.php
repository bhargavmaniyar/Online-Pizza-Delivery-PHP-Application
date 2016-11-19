<?php  session_start();
include 'controller/db_conn.php';
?>
<!doctype html>
<html class="fuelux" lang="en">


  
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

        <h3>List of Orders</h3>

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
              <h5>Orders</h5>
              <div class="widget-buttons">
                  <a href="http://www.datatables.net/usage/" data-title="Documentation" class="tip" target="_blank"><i class="icon-external-link"></i></a>
                  <a href="#" data-title="Collapse" data-collapsed="false" class="tip collapse"><i class="icon-chevron-up"></i></a>
              </div>
            </div>  
            <div class="widget-body">
              <table id="users" class="table table-striped table-bordered dataTable">
                <thead>
                  <tr>
                    <th>Sr no.</th>
                    <th>Name</th>
                    
                    <th>Contact</th>
                    <th>Date</th>
                    <th>Time</th>
                    
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    
<?php
$brid=$_SESSION['branch_id'];

$qry="select * from  order_master o,customer c where c.id=o.cus_id and c.br_id=$brid";
 $result= mysqli_query($con,$qry);
 $i=1;
 while($row= mysqli_fetch_array($result))
 {
      ?>              
            <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $row['fname'] ?>  <?php echo $row['lname'] ?></td>
                    <td><?php echo $row['contact_no'] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[4] ?></td>
                    
                    <td>
                      <div class="actions text-center">
                    <?php if($row['status']==0){ ?>      
                          <a class="edit" href="controller/c_order.php?act=u&st=1&id=<?php echo $row[0]?>"><i class="fa fa-check"></i></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="delete" href="controller/c_order.php?act=u&st=2&id=<?php echo $row[0]?>"><i class="fa fa-times"></i></a>
                    <?php } ?>
                    <?php if($row['status']==1){ ?>      
                     	<a href="#" onclick="" name="accepted">Accepted</a>
                        <?php } ?>
                        <?php if($row['status']==2){ ?>      
                     	<a href="#" onclick="" name="accepted">Rejected</a>
                        <?php } ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a class="edit" style="float: right;" href="order_detail.php?id=<?php echo $row[0]?>"><i class="fa fa-eye"></i></a>
                    
                  </div>
                        
                    </td>
                  </tr>
 <?php 
 
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
$("#upemployee").addClass("active");
$("#upemployee").parent().addClass("open");
$("#upemployee").parent().parent().addClass("active");
    </script>
</html>