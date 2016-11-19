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
    $subcatid = $_POST['subcatid'];
    $price =split(",",$_POST['price'][0]);
    
        
    $ing = $_POST['ingr'];
    $nm = $_POST['name'];
    $descr = $_POST['desc'];
    $siz = $_POST['size'];
    
    $img = $_FILES['img']['name'];
    $type = $_FILES['img']['type'];
    $size = $_FILES['img']['size'];
  
    $tmp_name = $_FILES['img']['tmp_name'];
    $location = '../images/';
    echo "<br/>" . move_uploaded_file($tmp_name, $location . $img);



    $qry = "select * from item where name='$nm'";
    echo $qry;
    $result = mysqli_query($con, $qry);
    echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['status'] = "0";
    } else {
        $qry = "insert into item (name,descr,subcat_id,type,img) values ('$nm','$descr',$subcatid,0,'$img')";
        echo "<br/><br/>" . $qry;
        mysqli_query($con, $qry);
        $qry = "select id from item where name='$nm'";
        $result = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($result);
        for ($i = 0; $i < sizeof($ing); $i++) {
            $q = "insert into item_ingr (item_id,ingr_id) values ($row[0],$ing[$i])";
            echo $ing[$i];
            mysqli_query($con, $q);
        }
        for ($i = 0; $i < sizeof($siz); $i++) {
            $q = "insert into item_size (item_id,size_id,price) values ($row[0],$siz[$i],'$price[$i]')";
            echo $ing[$i];
            mysqli_query($con, $q);
        }

        $_SESSION['status'] = "1";
    }
    if (mysqli_error($con) != null) {
        echo mysqli_error($con);
    } else {
        header("location:../item.php");
    }
    echo "<br/>" . $_SESSION['status'];
}

function edit() {
    global $con;
    $id = $_GET['id'];
    $qry = "select * from item i,sub_category s,category c where i.id=$id and s.cat_id=c.id and i.subcat_id=s.id";
    echo $qry;
    $result = mysqli_query($con, $qry);
    $_SESSION['eitem'] = mysqli_fetch_array($result);
    header("location:../item.php");
}

function del() {
    global $con;
    $id = $_GET['id'];
    $qry = "delete from item where id=$id";
    $result = mysqli_query($con, $qry);
    header("location:../item_search.php");
}

function select() {
    global $con;
    $qry = "select * from item";
    $result = mysqli_query($con, $qry);
    $a = "";
    while ($row = mysqli_fetch_array($result)) {
        $a = $a . "<option value=$row[0]>$row[1]</option>";
    }

    $_SESSION['ddcntry'] = $a;


    header("location:../state.php");
}

function update() {
    global $con;

    $id = $_POST['id'];
    $ing = $_POST['ingr'];
    $nm = $_POST['name'];
    $descr = $_POST['desc'];
    $subcatid = $_POST['subcatid'];
    $price =split(",",$_POST['price'][0]);
    $siz = $_POST['size'];
    
    $img = $_FILES['img']['name'];
    $type = $_FILES['img']['type'];
    $size = $_FILES['img']['size'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $location = '../images/';
    if ($img != "")
        echo "<br/>" . move_uploaded_file($tmp_name, $location . $img);

    $qry = "update item set name='$nm',img='$img',descr='$descr',subcat_id=$subcatid  where id=$id";
    $result = mysqli_query($con, $qry);
    echo "<br>" . mysqli_error($con) . "<br>";
    $qry = "delete  from item_ingr where item_id=$id";
    mysqli_query($con, $qry);
    $qry = "delete  from item_size where item_id=$id";
    mysqli_query($con, $qry);
    
    echo "<br>" . mysqli_error($con) . "<br>";
    for ($i = 0; $i < sizeof($ing); $i++) {

        $q = "insert into item_ingr (item_id,ingr_id) values ($id,$ing[$i])";
        echo $ing[$i];
        mysqli_query($con, $q);
    }

    for ($i = 0; $i < sizeof($siz); $i++) {
            $q = "insert into item_size (item_id,size_id,price) values ($id,$siz[$i],'$price[$i]')";
            
            mysqli_query($con, $q);
        }

echo mysqli_error($con);



    header("location:../item_search.php");
}

?>