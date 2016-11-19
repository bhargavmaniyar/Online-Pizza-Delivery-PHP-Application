<html>
    <?php
    session_start();
    include '../controller/db_conn.php';
    if(!isset($_COOKIE['cusid']) && !isset($_COOKIE['branch']))
    {
        header("location: index.php");
    }
    if(!isset($_COOKIE['item']))
    {
        header("location: i1.php");
    }
        
    ?>
    <head>
<title>Confirm Order</title>
        <script src="js/jquery.min.js"></script>

        <script>
            var ttlpr = 0;
            window.onbeforeunload = function(e) {
            var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                        
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                        }
                    }
                    xmlhttp.open("GET", "../controller/c_remove.php", true);
                    xmlhttp.send();

};
            function popup()
            {
                <?php if(!isset($_COOKIE['cusid'])){ ?>
                alert("Your Order is placed successfully and Your password is sent to your Email Address");
                <?php } else{ ?>
                alert("Your Order is placed successfully");
                <?php } ?>
            }
            function chg(a)
            {
                ttlpr = $(a).attr("pr");
                $("#price").html($(a).attr("pr"));
                $("[name='tp[]']").removeAttr("checked");
                $("#puqty").val("1");
            }

            $(document).ready(function() {

                var id;
                
                $(".qty").keyup(function(){
                    var x=$(this).parent().parent().children("[id='pice']").val();
                    y= +this.value * +x;
                    $(this).parent().parent().children("[id='frmpice']").val(y)
                   
                });
                    $(".del").click(function(){
                    
                    id=this.name;
                    im=this;
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                        
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                                   
                            
                                var x=$("#ntprice").html();
                                x=+x - +$(im).attr("pr");
                                $("#ntprice").html(x);
                                var y= +x * .2;
                                $("#tax").html(y);
                                var z = +x + +y;
                                $("#gttl").html(z);
                            $(im).parent().parent().remove(); 
                            
                        }
                    }
                    xmlhttp.open("GET", "../controller/settemp.php?removeid=" + id, true);
                    xmlhttp.send();

                });

                $("#sub").click(function(){
                    $("#frmpice").val($("#price").html());
                   
                });
                $("#puqty").change(function() {
                    var x = ttlpr;
                    var y = this.value;
                    var z = +x * +y;
                    $("#price").html(z);
                    
                });


                $('.add').click(function() {
                    id = this.name;
                    
                    

                });
                $("#close").click(function() {
                    $('.ing').hide();
                });

                $('.tpings').change(function() {
                    

                    var p1 = ttlpr;
                    var p2 = $(this).attr("pr");
                    var qt = $("#puqty").val();
                    alert(ttlpr + "i");

                    if ($(this).attr("checked"))
                    {
                        ttlpr = +p1 + +p2;
                        $("#price").html(+qt * (+p1 + +p2));
                    }
                    else
                    {
                        ttlpr = +p1 - +p2;
                        $("#price").html(+qt * (+p1 - +p2));
                    }
                    alert($(this).attr("pr") + " " + this.name);
                });

            });
        </script>
        <style>
            .ing-inner{
                width: 800px;
                margin-left:250px;
                margin-top: 100px;
                background:  #ffffff;



            }

            .ing
            {

                width:100%;
                height: 100%;
                position: absolute;
                background-color: transparent;
                text-align: center;
                display: none;
            }
            .main
            {
                float:left;
                width:100%;
                

            }

            .sub
            {
                width:1100px;
                
                margin-left: 10%;
            }
            .lhs
            {
                float:left;
                width:75%;
                
            }
            .rhs
            {
                			font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                float:left;
                width:20%;
                padding-left: 30px;
                padding-top: 10px;
                background-color: white;


            }
            .rhs-inner
            {
                		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                position: fixed;
                width: 200px;
                height: 440px;
                border: 1px solid;
                border-radius: 40px;
                padding: 20px;
                margin-left: -55px;
                margin-top: -10px;  
				background-color:#CCC;
                                background:linear-gradient(left, #999, #FFF);
                                box-shadow:10px 10px 5px #888888;

            }
            .rhs-inner-header
            {
                			font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                text-align: center;
                font-weight:bold;
				font-size:18px;
				background-color:#F00;
				border-radius:20px;
				height:30px;
				width:200px
            }
            .rhs-inner-order
            {
                			font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                border-top: 2px solid;
                clear: left;
                float: left;
                width: 100%;
                margin-top: 20px;
                height: 200px;
                overflow-y: auto;
            }
            .rhs-inner-footer
            {
border-top: 2px solid;

                clear: left;
                float: left;
                width: 100%;
                margin-top: 10px;
                height: 200px;


            }

            .lst{
                float: left;
                width: 750px;
                background-color: lightgray;
                box-shadow:5px 5px 5px #888888;

            }
            .catside
            {
                clear: left;
                float: left;
                width: 50px;
                background-color: palegreen;

            }
            .cat{
                background-color: pink;
                margin-left: -30px;
                margin-top: 100px;
                float: left;
                width: 100px;
                -moz-transform: rotate(-90deg); 
            }
            .it{
                float: left;
                width:160px;
                text-align: center;
                margin: 10px;
                border: #000 dotted  thin;


            }
            .spn
            {
                clear: left;
                float: left;
                text-align: center;
                alignment-adjust: central;
                background-color: red;
                width:100%;

            }
.form_head { width:98%!important
                ; background-color:#0CF; color:#FFF; padding:8px; text-align:left;  box-shadow:5px 5px 5px #888888;font-family: fantasy;font-weight: bold }
.subhead{clear: left;float: left;margin-left: 20px;margin-top: 20px;width: 100%; font-weight: bold;font-family: fantasy}
.subform{clear: left;float: left;margin-left: 20px;margin-top: 20px;width: 100%;font-family: fantasy}
.subform input { width:150px; height:30px; padding:5px; margin-top:5px; border-radius:5px;box-shadow:10px 10px 5px #888888;float: left;margin-left: 20px; }
.subform textarea { width:180px; height:100px; padding:5px; margin-top:5px; border-radius:5px;box-shadow:10px 10px 5px #888888;float: left;margin-left: 20px; }
.submit { width:100px; height:20px; background-color:red; color:#FFF; margin:auto; margin-bottom:10px; margin-top:10px; line-height:19px; font-weight: bold; font-family: sans-serif; padding:5px; cursor:pointer; border-radius: 40px;box-shadow:10px 10px 5px #888888; }

        </style>
    </head>
    <body>
        <div class="main">
            <div class="sub">
                <div class="lhs">
                        <div class="lst">
                            <div class="form_head" style="clear: left;float: left;width: 100%">
                                Finalize your Order
                            </div>
                            <div  style="" class="subhead">
                                Please enter the details to complete your order:
                            </div>
                            <form action="../controller/c_order.php" method="post">
                                <input type="hidden" name="act" value="i">
                            <div  style="" class="subform">
                                <?php if(!isset($_COOKIE['cusid'])){ ?>
                                <input type="text" placeholder="First Name" name="fname" required> 
                                <input type="text" placeholder="Last Name" name="lname" required >
                                <input type="text" placeholder="Email Address" name="email" required> 
                                <input type="text" placeholder="Mobile" name="mobile" required> 
                                <?php } ?>
                                <br>
                                <br>
                                <br>
                                <span style="clear: left;float: left; font-family: sans-serif;margin: 25px;" >Address at which the Order is to be delivered</span><textarea name="addr" placeholder="Address" required></textarea>
                            </div>
                            
                            <div   class="subform">
                                <input style="margin-left: 35%" type="submit" onclick="popup()" class="submit" value="Confirm Order"> 
                            </div>
                                </form>
    
                        </div>



                </div>

                <div class="rhs">

                    <div class="rhs-inner">
                        <div class="rhs-inner-header">
                            YOUR ORDER
                        </div>

                        <div class="rhs-inner-order">

                            <table width="100%">
<?php

if(isset($_COOKIE['item']))
{
$cnt1 = $_COOKIE['cnt'];

$it= $_COOKIE['item'];
$pr= $_COOKIE['price'];

$nm=$_COOKIE['nm'];
$qty=$_COOKIE['qty'];

for($i=0;$i<$cnt1;$i++)
{
    if(isset($nm[$i])){
?>                                                            
                                <tr style="padding: 5px;">
                                    <td width="5px" ></td>
                                    <td width="100px" style="padding-left: 15px"><?=$nm[$i]?> (<?=$qty[$i]?>)</td>
                                    <td width="5px" style="text-align: right"></td>
                                </tr>
    <?php } } }?>
                            </table>
                        </div> 
                        <div class="rhs-inner-footer">
                            <table width="100%">
                                <tr>
                                    <th>Total Price</th>
                                </tr>
                                <tr>
                                    <td>Net Price</td>
                                    <td><span id="ntprice"><?php if(isset($_COOKIE['total']))
                                    {
                                        echo $_COOKIE['total'];
                                    }
?></span></td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td><span id="tax"></span></td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td><span id="gttl"></span></td>
                                </tr>
<tr style="text-align: center">
                                    <form action="i1.php">
                                    <td colspan="2" style="text-align: center; padding:10px; padding-left: 40px;" ><input type="submit" value="Edit Order" style="display:block; background-color:#F00; font-size:18px; border-radius:10px; font-style:inherit;font-family:Lucida Sans Unicode;box-shadow:5px 7px 5px #888888;"/></td>
                                    </form>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

    </body>
    
</html>
<script>
    var x=$("#ntprice").html();
    var y= +x * .2;
    $("#tax").html(y);
    var z = +x + +y;
    $("#gttl").html(z);
    
</script>


