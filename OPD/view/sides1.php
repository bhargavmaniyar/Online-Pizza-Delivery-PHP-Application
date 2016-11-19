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

        <script src="js/jquery.min.js"></script>

        <script>
            var ttlpr = 0;

    function chg(a)
            {
                ttlpr = $(a).attr("pr");
                $("#price").html($(a).attr("pr"));
                $("[name='tp[]']").removeAttr("checked");
                $("#puqty").val("1");
            }
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
function abc()
{
    alert("DA");
}
            $(document).ready(function() {

                var id;
            
                $(".qty").keyup(function(){
                    var x=$(this).parent().parent().children("[id='pice']").val();
                    y= +this.value * +x;
                    $(this).parent().parent().children("[id='frmpice']").val(y)
                   alert(y); 
                });
                    $(".del").click(function(){
                    
                    id=this.name;
                    im=this;
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                        
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                        {
                                   alert("GAGd");
                            
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
                   alert($("#frmpice").val());
                });
                $("#puqty").change(function() {
                    var x = ttlpr;
                    var y = this.value;
                    var z = +x * +y;
                    $("#price").html(z);
                    alert($("[name=tp]").val());
                });


                $('.add').click(function() {
                    id = this.name;
                    alert($(this).parent().children([input='text']).val());
                    

                });
                $("#close").click(function() {
                    $('.ing').hide();
                });

                $('.tpings').change(function() {
                    alert($(this).attr("checked "));

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
            .pr
            {
                font-size:  small;
            }
            .nm{
                color: red;
            }

            .ing-inner{
                width: 800px;
                margin-left:250px;
                margin-top: 100px;
                background:  #ffffff;



            }

            .ing
            {
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                width:100%;
                height: 100%;
                position: absolute;
                background-color:#FFF;
                text-align: center;
                display: none;
            }
            .main
            {	font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                float:left;
                width:100%;
                background-color: white;  

            }

            .sub
            {
                width:1100px;
                background-color: white;
                margin-left: 10%;
            }
            .lhs
            {
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                float:left;
                width:75%;
                background-color: white
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
			 .rhs1
            {
					font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                float:left;
                width:20%;
                padding-left: 30px;
                padding-top: 100px;
                background-color: red;


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
                background-color:#FFF;


            }
            .catside
            {
                clear: left;
                float: left;
                width: 50px;
                background-color:white;
				display:marker;
				border-radius:20px;

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
            .it{
       float: left;
                width:160px;
                padding-bottom: 5px;
                text-align: center;
                margin: 10px;
                border: #000 dotted  thin;
                box-shadow:10px 10px 5px #888888;


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
			
			.it img
			{
				width:160px;
				
			
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
    <body vlink="#FFFFFF">
    <div class="headerline"></div>
        <div class="main">
            <div class="sub">
                <div class="lhs">
                    <?php
                    $qry = "select * from sub_category where cat_id=2";
                    $result = mysqli_query($con, $qry);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>              

                        <div class="catside">
                            <div class="cat"><?php echo $row['name']; ?></div>
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
                                    <img src="../images/<?php echo $rowit[6]; ?>" height="100px" width="150px"/>
                                    <span class="spn nm"><?php echo $rowit['name']; ?></span>
                                    <span class="spn pr">
        <?php
$rowp = mysqli_fetch_array($res1)
            ?>

                                            Rs.  <?php echo $rowp['price']; ?>
                                            

                                    </span>
                                    <form action="../controller/settemp.php" method="get">
        <input type="hidden" id="itemid" name="itemid" value="<?= $rowit['id'] ?>"  />
                                        <input type="hidden" id="pice" name="frmprice" value="<?= $rowp['price'] ?>"  />
                                        <input type="hidden" id="frmpice" name="frmprice" value="<?= $rowp['price'] ?>"  />
                                        <input type="hidden" id="itemname" name="itemname" value="<?= $rowit['name'] ?>" />
                                        <input type="hidden" id="rd" name="rd" value="<?= $rowp['size_id'] ?>" />
                                        
        <input type="hidden"  name="page" value="sides" />
        
        <span class="spn">Qty: &nbsp;<input type="text"  class="qty" value="1" style="width: 27px; border-radius: 5px; padding: 4px; " name="qty" class="qty" /> &nbsp;<input  type="submit" value="Add" style=" background-color:#F00; border-radius:20px; font-size:12px "></span>
                                    </form>

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
                                    <td width="5px" ><a href="#" class="edit" name="<?php echo $i;?>"> E</a></td>
                                    <td width="100px" style="padding-left: 15px"><?php echo $nm[$i];?> (<?php echo $qty[$i]; ?>)</td>
                                    <td width="5px" style="text-align: right"><a href="#" class="del" pr="<?php echo $pr[$i];?>" name="<?php echo $i;?>"> X</a></td>
                                </tr>
    <?php } } }?>
                            </table>
                        </div> 
                        <div class="rhs-inner-footer">
                            <table width="100%">
                                <tr>
                                    <th style="font-size:18px ;">Total Price</th>
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
                                    <form action="confirm-order.php">
                                    <td colspan="2" style="text-align: center; padding:10px; padding-left: 25px;" ><input type="submit" value="Confirm Order" style="display:block; background-color:#F00; font-size:18px; border-radius:10px; font-style:inherit;font-family:Lucida Sans Unicode;box-shadow:5px 7px 5px #888888;"/></td>
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


