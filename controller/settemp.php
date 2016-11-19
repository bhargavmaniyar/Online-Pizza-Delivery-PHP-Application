<?php

session_start();
include './db_conn.php';
if (isset($_GET['id'])) {
    header('Content-type: application/xml');
    $id = $_GET['id'];
    $qry = "select * from item as i1 ,item_size as s1 where  i1.id=s1.item_id and  i1.id=" . $id . " order by s1.size_id";
    $res = mysqli_query($con, $qry);
    echo "<root>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<image>";
        echo $row[6];
        echo "</image>";
        echo "<price>";
        echo $row[10];
        echo "</price>";
        echo "<name>";
        echo $row[1];
        echo "</name>";
    }
    echo "</root>";
}


if (isset($_GET['itemid'])) {
    $pr = $_GET['frmprice'];
    if (!isset($_COOKIE['cnt'])) {
        setcookie("cnt", 1, 0, '/');
        setcookie("total", $pr, 0, '/');

        $count = 0;
    } else {
        $count = $_COOKIE['cnt'];
        setcookie("cnt", $_COOKIE['cnt'] + 1, 0, '/');
        setcookie("total", $_COOKIE['total'] + $pr, 0, '/');
    }



    echo "fas" . count($_COOKIE) . "<br/>";
    echo $count;

    $id = $_GET['itemid'];
    $nm = $_GET['itemname'];
    $size=$_GET['rd'];
    if (!isset($_GET['tp'])) {
        $tp = "0";
    } else {
        $toppings = $_GET['tp'];
        $tp = $toppings[0];
        for ($i = 1; $i < count($toppings); $i++) {
            $tp = $tp . "," . $toppings[$i];
        }
    }
    $qty = $_GET['qty'];


    setcookie("price[$count]", $pr, time() + 60 * 24 * 60 * 60, '/');

    setcookie("item[$count]", $id, time() + 60 * 24 * 60 * 60, '/');
    setcookie("topping[$count]", $tp, time() + 60 * 24 * 60 * 60, '/');
    setcookie("qty[$count]", $qty, time() + 60 * 24 * 60 * 60, '/');
    setcookie("nm[$count]", $nm, time() + 60 * 24 * 60 * 60, '/');
    setcookie("size[$count]", $size, time() + 60 * 24 * 60 * 60, '/');
if(isset($_GET['page']))
{
    echo $qty ."ds<br>";
header("location: ../view/sides1.php");
}
else
{
    header("location: ../view/i1.php");
}
}


if (isset($_GET['removeid'])) {
    header('Content-type: application/xml');
    $count = $_GET['removeid'];
    setcookie("item[$count]", "", -90, '/');
    setcookie("topping[$count]", "", -60, '/');
    setcookie("qty[$count]", "", -60, '/');
    setcookie("nm[$count]", "", -60, '/');
    setcookie("size[$count]", "", -60, '/');
    $p = $_COOKIE['price'];

    setcookie("total", $_COOKIE['total'] - $p[$count], time() + 60 * 24 * 60 * 60, '/');


    setcookie("price[$count]", "", -60, '/');
}
?>


