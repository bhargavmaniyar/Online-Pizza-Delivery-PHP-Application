<?php
include 'controller/db_conn.php';
session_start();
if (!isset($_SESSION['ddcat'])) {
    echo"<script>alert('da');</script>";
    header("location: controller/c_category.php?act=s&page=item.php");
}
if (!isset($_SESSION['dding'])) {
    echo"<script>alert('da');</script>";
    header("location: controller/c_ingredient.php?act=s");
}
if (!isset($_SESSION['ddsize'])) {
    echo"<script>alert('da');</script>";
    header("location: controller/c_size.php?act=s&page=item.php");
}
?>
<!doctype html>
<html class="fuelux" lang="en">

    

    <head>

        <link href="assets/css/select2.css" rel="stylesheet">


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
        <?php include('cssjs.php'); ?>
    </head>

    <body>

        <section class="content">

            <!-- Sidebar Start -->
            <?php include('sidebar.php'); ?>
            <!-- Sidebar End -->

            <div class="content-liquid-full">
                <div class="container">

                    <!-- Header Bar Start -->
                    <?php include('header.php'); ?>
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

                            <h3>Add Item</h3>

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

                                            <form action="controller/c_item.php" method="post" class="basic-form" enctype="multipart/form-data">
                                                <input type="hidden" id="act" name="act" value="i"/>
                                                <input type="hidden" id="id" name="id"/>


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Category:</label>

                                                        <select id="dropdown" name="catid">
                                                            <option selected="selected">Select Category</option>
                                                            <?= $_SESSION['ddcat'] ?>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Sub-Category</label>

                                                        <select id="dropdown1" name="subcatid">
                                                            <option selected="selected">Select Sub-Category</option>

                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Name:</label>
                                                        <input type="text" id="name" name="name" placeholder="Item Name" />

                                                    </div>

                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Item Image:</label>
                                                        <input type="file"  id="img" name="img"   />

                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label >Description</label>
                                                        <textarea name="desc" id="desc" placeholder="Description"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Ingredients</label>
                                                        <select id="select2-multi-value" name="ingr[]" multiple=""style="width: 395px;">

                                                            <?= $_SESSION['dding'] ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Size:</label>
                                
                                                                                <select id="select2-multi-value1" name="size[]" multiple=""style="width: 395px;">

                                                            <?= $_SESSION['ddsize'] ?>
                                                        </select>
                               
                                                    </div>

                                                </div>




                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Price:</label>
                                
                                                        <input id="select2-tags" name="price[]" multiple="" width="395px" style="width: 395px">
                               
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 text-left">
                                                        <button id="btn" type="submit" class="btn btn-lg btn-success"><i class="fa fa-check"></i> Save</button><br>
                                                    </div>
                                                    <?php
                                                    if (isset($_SESSION['status'])) {
                                                        if ($_SESSION['status'] == "1") {
                                                            ?>
                                                            <div class="notification notification-success">
                                                                <strong>Added Successfully.</strong>
                                                            </div>
    <?php
    } else {
        ?>    
                                                            <div class="notification notification-error">

                                                                <strong>Already Exists.</strong>
                                                            </div>
                                                        <?php
                                                        }
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

        <script src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.js"></script>
        <script type="text/javascript" src="assets/js/realm.js"></script>

        <script type="text/javascript" src="assets/js/select2.min.js"></script>

        <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.bootstrap.wizard.min.js"></script>    

    </body>

    <script>
        $("#select2-multi-value").select2();
        
        $("#select2-multi-value1").select2();
        function ch(a)
        {

            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {

                    $("#dropdown1").html(xmlhttp.responseText);
<?php
if (isset($_SESSION['eitem'])) {
    $row = $_SESSION['eitem'];
        
    ?>
                        $("#dropdown1").val("<?= $row["subcat_id"] ?>");
<?php } ?>

                }
            }

            xmlhttp.open("GET", "controller/c_subcategory.php?act=s&catid=" + a.value, true);
            xmlhttp.send();


        }
        $("#dropdown").change(function() {
            ch(this);
        });
      $("#select2-tags").select2({tags:[""],tokenSeparators: [",", " "]});
    </script>
<?php
if (isset($_SESSION['eitem'])) {
    $row = $_SESSION['eitem'];
    $q="SELECT * FROM ingredient i,item_ingr ii,item it WHERE ii.item_id=it.id AND ii.ingr_id=i.id AND it.id=$row[0]";
    $rslt= mysqli_query($con,$q);
    
    $tmp="";
    
    while($rp=mysqli_fetch_array($rslt))
    {
        $tmp=$tmp . "{id:'$rp[0]',text:'$rp[1]'},";
     } 
    
     $q="SELECT * FROM item_size i,size s WHERE i.size_id=s.id AND i.item_id=$row[0]";
    $rslt1= mysqli_query($con,$q);
    
    $sz="";
    $pr="";
    $pr1="";
    
    while($rp=mysqli_fetch_array($rslt1))
    {
        $sz=$sz . "{id:'$rp[2]',text:'$rp[5]'},";
        if($pr=="")
        {
            $pr="\"$rp[3]\"";
        }
        else
        $pr=$pr. "," ."\"$rp[3]\"";
           $pr1=$pr1 . "{id:'$rp[3]',text:'$rp[3]'},";
     } 
     
     
     ?>
        <script type="text/javascript">
            $("#dropdown").val("<?= $row["cat_id"] ?>");
            ch(document.getElementById("dropdown"));
             $("#select2-multi-value").select2('data',[<?=$tmp?>]);
             $("#select2-multi-value1").select2('data',[<?=$sz?>]);
             $("#select2-tags").select2({tags:[<?= $pr?>],tokenSeparators: [",", " "]});
             $("#select2-tags").select2('data',[<?=$pr1?>]);
       
            $("#name").val("<?php echo $row[1] ?>");
            $("#desc").val("<?php echo $row[2] ?>");
            $("#desc").val("<?php echo $row[2] ?>");
            $("#id").val("<?php echo $row[0] ?>");
            $("#act").val("u");
            $("#btn").html("<i class='fa fa-check'></i> Update");
       
        </script>

    <?php

}
?>

<script>
$("#item").addClass("active");
$("#item").parent().addClass("open");
$("#item").parent().parent().addClass("active");
    </script>

</html>
