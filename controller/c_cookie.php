<?php
session_start();
include './db_conn.php';

if(!isset($_POST['login']))
{
    echo $_POST['branch'];
    setcookie("branch",$_POST['branch'],0, '/');
    header("location: ../view/i1.php");
}
 else {
    
    echo "login";
    $mb=$_POST['mobile'];
    $ps=$_POST['password'];
    $qry = "select * from customer where contact_no='$mb' and password='$ps'";
        $resulttmp = mysqli_query($con, $qry);
        $rowxx = mysqli_fetch_array($resulttmp);
        echo mysqli_error($con);
        if ($rowxx != null) {
            
            setcookie("cusid",$rowxx[0],0, '/');
            header("location: ../view/i1.php");
        } 
        else
        {
            $_SESSION['status']="invalid";
            header("location: ../view/index.php");
        }
}

?>
