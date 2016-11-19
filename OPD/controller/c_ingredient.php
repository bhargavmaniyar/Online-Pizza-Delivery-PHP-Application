<?php
session_start();


include 'db_conn.php';
if(isset($_POST['act']))
$act=$_POST['act'];
else
    $act=$_GET['act'];


switch($act)
{
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






function insert()
{
    global  $con;
    $nm= $_POST['name'];
$descr=$_POST['desc'];
$price=$_POST['price'];

$qry="select * from ingredient where name='$nm'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0)
 {
 $_SESSION['status']="0";   
 }
   else
   {
       $qry= "insert into ingredient (name,descr,price) values ('$nm','$descr','$price')";
       mysqli_query($con, $qry);
        $_SESSION['status']="1";   
   }
if(mysqli_error($con)!=null)
{
    echo mysql_error($con);
    
}
else
{
header("location:../ingredient.php");
}
echo "<br/>" .$_SESSION['status'];
}

function edit()
{
  global $con;
  $id=$_GET['id'];
  $qry="select * from ingredient where id='$id'";
  $result = mysqli_query($con, $qry);
  $_SESSION['eing']=  mysqli_fetch_array($result);
  header("location:../ingredient.php");
  
}

function del()
{
    global $con;
  $id =$_GET['id'];
  $qry="delete from ingredient where id=$id";
  $result = mysqli_query($con, $qry);
  header("location:../ingredient_search.php");
    
}
function select()
{
  global $con;
  $qry="select * from ingredient";
  $result = mysqli_query($con, $qry);
  $a="";
  while($row= mysqli_fetch_array($result))
  {
      $a=$a."<option value=$row[0] id=$row[0]>$row[1]</option>";
      
  }
  
  $_SESSION['dding']=$a;
  
  if(isset($_GET['page']))
  {
        header("location:../".$_GET['page']);
  }
  else{
        header("location:../item.php");
  
  }
    
}


function update()
{
  global $con;
  
  $id =$_POST['id'];
  $nm= $_POST['name'];
  $descr=$_POST['desc'];
  $price=$_POST['price'];
  $qry="update ingredient set name='$nm',descr='$descr',price='$price' where id=$id";
  $result = mysqli_query($con, $qry);
  
  header("location:../ingredient_search.php");
    
}
?>