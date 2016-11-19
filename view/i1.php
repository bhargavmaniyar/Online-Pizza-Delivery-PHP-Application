<html>
    <?php
    session_start();
    include '../controller/db_conn.php';
    if(!isset($_COOKIE['cusid']) && !isset($_COOKIE['branch']))
    {
        header("location: index.php");
    }
    
    ?>
    <head>
        <title>Pizza</title>
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
function chg(a)
            {
                ttlpr = $(a).attr("pr");
                $("#price").html($(a).attr("pr"));
                $("[name='tp[]']").removeAttr("checked");
                $("#puqty").val("1");
            }

            $(document).ready(function() {

                var id;

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
                    $("#itemid").val(id);
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                            
                            $("#pusize").html("");


                            var pr = xmlhttp.responseXML.getElementsByTagName("price");
                            var im = xmlhttp.responseXML.getElementsByTagName("image");
                            var nm = xmlhttp.responseXML.getElementsByTagName("name");
                            
                            $("#itemname").val(nm[0].childNodes[0].nodeValue);
                            ttlpr = pr[0].childNodes[0].nodeValue;
                            
                            $("#price").html(pr[0].childNodes[0].nodeValue);
                            for (i = 0; i < pr.length; i++)
                            {
                                g = +i + +1;
                                
                                if (i == 0)
                                    $("#pusize").html($('#pusize').html() + "<tr><td><input type='radio' onClick='chg(this)' id='tmp' checked='true'  name='rd' pr='" + pr[i].childNodes[0].nodeValue + "'  value='" + g + "' />Regular(Rs." + pr[i].childNodes[0].nodeValue + " ) </td></tr>");
                                if (i == 1)
                                    $("#pusize").html($('#pusize').html() + "<tr><td><input type='radio' onClick='chg(this)' name='rd' pr='" + pr[i].childNodes[0].nodeValue + "'  value='" + g + "' />Medium(Rs." + pr[i].childNodes[0].nodeValue + " ) </td></tr>");
                                if (i == 2)
                                    $("#pusize").html($('#pusize').html() + "<tr><td><input type='radio' onClick='chg(this)' name='rd' pr='" + pr[i].childNodes[0].nodeValue + "'  value='" + g + "' />Large(Rs." + pr[i].childNodes[0].nodeValue + " ) </td></tr>");

                            }
                            $("#puimg").attr("src", "../images/" + im[0].firstChild.nodeValue);
                            $('#ingr').toggle();


                        }
                    }
                    xmlhttp.open("GET", "../controller/settemp.php?id=" + id, true);
                    xmlhttp.send();


                });
                $("#close").click(function() {
                    $('.ing').hide();
                });

                $('.tpings').change(function() {
                    

                    var p1 = ttlpr;
                    var p2 = $(this).attr("pr");
                    var qt = $("#puqty").val();
                    

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
                    
                });

            });
        </script>
        <style>
            .ing-inner{
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                width: 800px;
                margin-left:250px;
                margin-top: 0px;
                background:white;
                height: 500px;
                box-shadow:10px 10px 5px #888888;



            }

            .ing
            {
            font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;

                width:100%;
                height: 100%;
                position: absolute;
                background-color: transparent;
                text-align: center;
                display: none;
            }
            .main
            {
				font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                float:left;
                width:100%;
                background-color: white;  

            }

            .sub
            {
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                width:1100px;
                background-color:white;
                margin-left: 10%;
            }
            .lhs
            {
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
				font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                float:left;
                width:75%;
                background-color: white;
				display:block;
				background-color:white;

            }
            .close
            {
                color: black;
                text-decoration: none;
            }
            .rhs
            {
                float:left;
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                width:20%;
                padding-left: 30px;
                padding-top: 10px;
                background-color:white;


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
				background:#CCC;
				background:linear-gradient(left, #999, #FFF);
			box-shadow:10px 10px 5px #888888;

            }
            .rhs-inner-header
            {
                text-align: center;
				font-size:18px;
                font-weight:bold;
				background-color:#F00;
				border-radius:20px;
				height:30px;
				width:200px
            }
            .rhs-inner-order
            {
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
                background-color:white;
				font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;

            }
            .catside
            {
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                clear: left;
                float: left;
                width: 50px;
                
				
			
            }
            .cat{
		
				display:block;
				text-align:center;
		font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                background-color:#6c3;
                margin-left: -70px;
                margin-top: 90px;
                float: left;
                width: 180px;
                border-top-left-radius: 100px;
                -moz-transform: rotate(-90deg); 
            }
			
			.catside img
			{
				height:300px;
				width:10px;
				margin-top:100px;
			}
			
            .it{
                float: left;
                width:160px;
                padding-bottom: 5px;
                text-align: center;
                margin: 10px;
                border: #000 dotted  thin;
                box-shadow:10px 10px 5px #888888;


            }
			.it img
			{
				width:160px;
				
			
			}
            .spn
            {
                clear: left;
                float: left;
                text-align: center;
                alignment-adjust: central;
                background-color: white;
                width:100%;
				

            }
            .pr
            {
                font-size:  small;
            }
            .nm{
                color: red;
            }
			.spn1
            {
                clear: left;
                float: left;
                text-align: center;
                alignment-adjust: central;
                background-color: red;
                margin-left: 15px;
                width:80%;
				display:block;
				border-radius:20px;
				color:white;
				box-shadow:1px 1px 2px #888888;

            }
			.spn link
			{
				color:#FFF;
			}
			.span .add
			{
				display:block;
				background-color:#F00;
				border-radius:20px;
                                
                                
			}
                        .csa
                        {
                           text-decoration: none;
                            color: white;
                            font-size: smaller;
                            font-weight: bold;
                             
                        }
			.headerline
			{
				margin-left:125px;
				margin-bottom:5px;
				width:1100px;
				height:50px;
				background-color:#C30;
				border-radius:20px;
			}
			
        </style>
    </head>
    <body vlink="#FFFFFF" >
    <div class="headerline"></div>
        <div class="main">
            <div class="sub">
                <div class="lhs">
                    <?php
                    $qry = "select * from sub_category where cat_id=1";
                    $result = mysqli_query($con, $qry);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>              

                        <div class="catside">
                            <div class="cat" ><?php echo $row['name']; ?></div>
                        </div>
                        <div class="lst">
                            <?php
                            $qry = "select * from item where subcat_id=$row[0]";
                            $res = mysqli_query($con, $qry);
                            $i = 1;
                            while ($rowit = mysqli_fetch_array($res)) {
                                $qry = "select * from item_size where item_id=$rowit[0] order by size_id";
                                $res1 = mysqli_query($con, $qry);
                                ?>           

                                <div class="it">
                                    <img src="../images/<?php echo $rowit[6]; ?>" height="100px" width="150px" />
                                    <span class="spn nm"><?php echo $rowit['name']; ?></span>
                                    <span class="spn pr">
        <?php
        $i = 1;
        while ($rowp = mysqli_fetch_array($res1)) {
            ?>

                                            <?php echo $rowp['price']; ?>
                                            <?php if ($i == 1) { ?>A <?php } ?>
                                            <?php if ($i == 2) { ?>B <?php } ?>
                                            <?php if ($i == 3) { ?>C<?php } ?>


            <?php $i++;
        }
        ?>
                                    </span>
                                    <span class="spn1"><a href="#" class="add csa"  name="<?php echo $rowit['id']; ?>" >Customize & Add</a></span>


                                </div>
    <?php } ?>
                        </div>


<?php } ?>
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
                                <tr style="padding: 5px; background-color:#CCC">
                                    <td width="5px" ><a href="#" class="edit" name="<?php echo $i; ?>"> E</a></td>
                                    <td width="100px" style="padding-left: 15px"><?=$nm[$i]?> (<?php echo $qty[$i]; ?>)</td>
                                    <td width="5px" style="text-align: right"><a href="#" class="del" pr="<?php echo $pr[$i]; ?>" name="<?php echo $i; ?>"> X</a></td>
                                </tr>
    <?php } } }?>
                            </table>
                        </div> 
                        <div class="rhs-inner-footer">
                            <table width="100%">
                                <tr>
                                    <th style="font-size:18px">Total Price</th>
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
                                    <td style="font-size:18px; font-style:bold; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;">Grand Total</td>
                                    <td><span id="gttl"></span></td>
                                </tr>
                                <tr style="text-align: center">
                                    <form action="sides1.php">
                                    <td colspan="2" style="text-align: center; padding:10px" ><input type="submit" value="Proceed to slides" style="display:block; background-color:#F00; font-size:18px; border-radius:10px; font-style:inherit;font-family:Lucida Sans Unicode;box-shadow:5px 7px 5px #888888;"/></td>
                                    </form>
                                </tr>

                            </table>
                        </div>

                    </div>
                </div>
            </div>

    </body>
    <form id="frm1" action="../controller/settemp.php" method="get">
        <input type="hidden" id="itemid" name="itemid"/>
        <input type="hidden" id="frmpice" name="frmprice"/>
        
        <input type="hidden" id="itemname" name="itemname"/>
        
        <div id="ingr" class="ing" >
            <div class="ing-inner">
                <div style="width: 100%;height: 100%">
                    <div style="float:left;margin-left: 10px">
                        <div style="clear: left;float: left; width: 100%">
                            <span id="itemname"></span>
                        </div> 
                        <div style="clear: left;float: left; width: 100%">

                        </div>

                        <div>
                        </div>


                    </div>
                    <div style="float:right;margin-right: 10px"><a href="#" id="close" class="close">X</a></div>
                    <div style="clear:left;float:left; width: 100%">
                        <div style="clear:left; float: left;width: 20%;height:400px;background-color: blue">
                            <img id="puimg" src="" width="100%" height="100%" />
                        </div>
                        <div style="float: left;width: 40%; background-color:white">
                            <div style="background:#09F;border: 2px solid; border-radius: 10px;margin-left:8px;width:270px; font-size:20px;">
                                Select Size

                            </div>
                            <div style="clear:left;float: left;padding-left: 50px">
                                <table id="pusize" width="100%">

                                </table>
                            </div>
                        </div>
                        <div style="float: left;width: 40%; background-color:white">
                            <div style="background:#09F;border: 2px solid; border-radius: 10px;margin-left:8px;width:270px; font-size:20px">
                                Extra Toppings
                            </div>
                            <div style="clear:left;float: left;padding-left: 30px ; overflow-y: auto">
                                <table width="100%">
<?php
$qry = "select * from ingredient";
$res = mysqli_query($con, $qry);
$i = 1;
while ($rowin = mysqli_fetch_array($res)) {
    ?>
                                        <tr>
                                            <td width="200px"><?php echo  $rowin['name']; ?></td>
                                            <td><input type="checkbox" name="tp[]" class="tpings" pr="<?php echo $rowin['price']; ?>"  value="<?= $rowin['id'] ?>"/></td>
                                        </tr>
<?php } ?>
                                </table >
                                
                            </div>
                           
                    </div>
                     <table style="margin-top:350px; margin-left:250px ; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; display:block; width:250px; background-color:#CCC; border-radius:20px; text-align:center; border-color:#999 ; border:thick">


                                    <tr>
                                        <td width="100px">Qty <input id="puqty" name="qty" value="1" type="text" style="width: 25px" /></td>
                                        <td style="" >Price : Rs.<span id="price" style="font-size:18px">100</span></td>
                                    </tr>
                                </table>

                        </div>
                    <div style="clear:left;float:left; width: 100%;">
                        <input type="submit" id="sub" value="Done" style="margin-top:0px;display:block;background-color:#F00;color:#FFF; border-radius:20px; font-size:18px; margin-left:350px; position:relative">
                    </div>
                </div>     

            </div>

            
            
        </div>

    </form>
</html>
<script>
    var x=$("#ntprice").html();
    var y= +x * .2;
    $("#tax").html(y);
    var z = +x + +y;
    $("#gttl").html(z);
    
</script>
