<html>
    <?php
    session_start();
    include '../controller/db_conn.php';
    ?>
    <head>
<title>Sides</title>
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
                background-color: green;  

            }

            .sub
            {
                width:1100px;
                background-color: black;
                margin-left: 10%;
            }
            .lhs
            {
                float:left;
                width:75%;
                background-color: blue;
            }
            .rhs
            {
                float:left;
                width:20%;
                padding-left: 30px;
                padding-top: 100px;
                background-color: red;


            }
            .rhs-inner
            {
                position: fixed;
                width: 200px;
                height: 400px;
                border: 1px solid;
                border-radius: 40px;
                padding: 20px;

            }
            .rhs-inner-header
            {
                text-align: center;
                font-weight:bold;
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
                background-color: #00c7f7;


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

        </style>
    </head>
    <body>
        <div class="main">
            <div class="sub">
                <div class="lhs">
                    <?php
                    $qry = "select * from sub_category where cat_id=2";
                    $result = mysqli_query($con, $qry);

                    while ($row = mysqli_fetch_array($result)) {
                        ?>              

                        <div class="catside">
                            <div class="cat"><?= $row['name'] ?></div>
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
                                    <img src="../images/<?=$rowit[6]?>" height="100px" width="150px"/>
                                    <span class="spn"><?= $rowit['name'] ?></span>
                                    <span class="spn">
        <?php
$rowp = mysqli_fetch_array($res1)
            ?>

                                            Rs.  <?= $rowp['price'] ?>
                                            

                                    </span>
                                    <form action="../controller/settemp.php" method="get">
                                        <input type="hidden" id="itemid" name="itemid" value="<?= $rowit['id'] ?>"  />
                                        <input type="hidden" id="pice" name="frmprice" value="<?= $rowp['price'] ?>"  />
                                        <input type="hidden" id="frmpice" name="frmprice" value="<?= $rowp['price'] ?>"  />
                                        <input type="hidden" id="itemname" name="itemname" value="<?= $rowit['name'] ?>" />
                                        <input type="hidden" id="rd" name="rd" value="<?= $rowp['size_id'] ?>" />
                                        
        <input type="hidden"  name="page" value="sides" />
        
                                        <span class="spn">Qty: &nbsp;<input type="text" class="qty" value="1" style="width: 30px; padding: 4px;" name="qty" class="qty" /> &nbsp;<input  type="submit" value="Add"></span>
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
                                <tr style="padding: 5px;">
                                    <td width="5px" ><a href="#" class="edit" name="<?=$i?>"> E</a></td>
                                    <td width="100px" style="padding-left: 15px"><?=$nm[$i]?> (<?=$qty[$i]?>)</td>
                                    <td width="5px" style="text-align: right"><a href="#" class="del" pr="<?=$pr[$i]?>" name="<?=$i?>"> X</a></td>
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
                                <form action="confirm-order.php">
                                    <td colspan="2" ><input type="submit" value="Confirm Order"/></td>
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


