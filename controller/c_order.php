<?php

session_start();


include 'db_conn.php';
if (isset($_POST['act']))
    $act = $_POST['act'];
else
    $act = $_GET['act'];


switch ($act) {
    case 'i':
        insert();
        break;
    case 'e':
        edit();
        break;
    case 'd':
        del();
        break;
    case 'u':
        update();
        break;
    case 's':
        select();
        break;
}

function insert() {
    global $con;
    $addr = $_POST['addr'];
    if (isset($_COOKIE['branch'])) {


        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $brid = $_COOKIE['branch'];

        echo $brid;
        $qry = "select * from customer where contact_no='$mobile'";
        $resulttmp = mysqli_query($con, $qry);
        $rowxx = mysqli_fetch_array($resulttmp);
        if ($rowxx != null) {
            $_SESSION['userexists'] = "true";
            
            $qry = "update  customer set fname = '$fname',lname='$lname',email='$email',br_id=$brid where  contact_no='$mobile'";
            mysqli_query($con, $qry);
            echo mysqli_error($con);
        } else {
            $qry = "insert into customer (fname,lname,contact_no,email,password,br_id) values ('$fname','$lname','$mobile','$email','123',$brid)";
            mysqli_query($con, $qry);
        }
                    $qry = "select * from customer where contact_no='$mobile'";
            $result = mysqli_query($con, $qry);
            $row = mysqli_fetch_array($result);
            $cusid = $row[0];
            echo "<br>" . $cusid;

    } else {
        $cusid = $_COOKIE['cusid'];
    }

    $date = date("Y-m-d");
    $time = date("G:i:s", time());
    echo $date;
    $qry = "insert into order_master (cus_id,date,time,addr,status) values ($cusid,'$date','$time','$addr',0)";
    mysqli_query($con, $qry);
    echo "<br>" . mysqli_error($con);


    $qry = "select max(id) from order_master where cus_id=$cusid";
    $resulto = mysqli_query($con, $qry);
    $rowo = mysqli_fetch_array($resulto);
    echo "<br>" . mysqli_error($con);
    $orid = $rowo[0];

    $cnt = $_COOKIE['cnt'];

    $it = $_COOKIE['item'];
    $tp = $_COOKIE['topping'];
    $qty = $_COOKIE['qty'];
    $size = $_COOKIE['size'];
    $i = 0;
    while ($i < $cnt) {

        if (isset($it[$i])) {
            echo $qty[$i] . "Q";
            echo $it[$i] . "it";
            echo $size[$i] . "size";

            $qry = "insert into order_item (order_id,item_id,size_id,qty) values ($orid,$it[$i],$size[$i],$qty[$i])";
            mysqli_query($con, $qry);
            echo "<br>" . mysqli_error($con);
            if ($tp[$i] != 0) {
                $qry = "select max(id) from order_item where item_id=$it[$i]";
                $result1 = mysqli_query($con, $qry);
                echo "<br>" . mysqli_error($con);
                $row1 = mysqli_fetch_array($result1);
                echo "<br>" . mysqli_error($con);

                $oritm = $row1[0];
                $tp1 = split(',', $tp[$i]);
                for ($j = 0; $j < count($tp1); $j++) {
                    $qry = "insert into order_ingr (ordit_id,ing_id) values ($oritm,$tp1[$j])";
                    mysqli_query($con, $qry);
                    echo "<br>" . mysqli_error($con);
                    echo "$j";
                }
            }
        }
        $i++;
    }


    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach ($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time() - 1000);
            setcookie($name, '', time() - 1000, '/');
        }
    }
    header("location: ../view/index.php");
}

function edit() {
    global $con;
    $id = $_GET['id'];
    $qry = "select * from branch b,city ci,state s,country c where b.id=$id and ci.id=b.city_id and s.cntry_id=c.id and ci.state_id=s.id";
    echo $qry;
    $result = mysqli_query($con, $qry);
    $_SESSION['ebranch'] = mysqli_fetch_array($result);
    echo mysqli_error($con);
    header("location:../branch.php");
}

function del() {
    global $con;
    $id = $_GET['id'];
    $qry = "delete from order_master where id=$id";
    $result = mysqli_query($con, $qry);
    header("location:../order.php");
}

function select() {
    header('Content-type: text/html');
    global $con;
    $id = $_GET['cityid'];
    $qry = "select * from branch where city_id=$id";
    $result = mysqli_query($con, $qry);
    $a = "<option selected='selected'>Select Branch</option>";
    while ($row = mysqli_fetch_array($result)) {
        $a = $a . "<option value=$row[0]>$row[1]</option>";
    }

    echo $a;


    //header("location:../state.php");
}

function update() {
    global $con;

    $id = $_GET['id'];
    $st = $_GET['st'];
    $qry = "update order_master set status=$st where id=$id";
    $result = mysqli_query($con, $qry);

    header("location:../order.php");
}

?>