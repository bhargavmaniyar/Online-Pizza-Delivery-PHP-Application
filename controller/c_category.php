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

$qry="select * from category where name='$nm'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0)
 {
 $_SESSION['status']="0";   
 }
   else
   {
       $qry= "insert into category (name,descr) values ('$nm','$descr')";
       mysqli_query($con, $qry);
        $_SESSION['status']="1";   
   }
if(mysqli_error($con)!=null)
{
    echo mysql_error($con);
    
}
else
{
header("location:../category.php");
}
echo "<br/>" .$_SESSION['status'];
}

function edit()
{
  global $con;
  $id=$_GET['id'];
  $qry="select * from category where id='$id'";
  $result = mysqli_query($con, $qry);
  $_SESSION['ecat']=  mysqli_fetch_array($result);
  header("location:../category.php");
  
}

function del()
{
    global $con;
  $id =$_GET['id'];
  $qry="delete from category where id=$id";
  $result = mysqli_query($con, $qry);
  header("location:../category_search.php");
    
}
function select()
{
  global $con;
  $qry="select * from category";
  $result = mysqli_query($con, $qry);
  $a="";
  while($row= mysqli_fetch_array($result))
  {
      $a=$a."<option value=$row[0] id=$row[0]>$row[1]</option>";
      
  }
  
  $_SESSION['ddcat']=$a;
  
  if(isset($_GET['page']))
  {
        header("location:../".$_GET['page']);
  }
  else{
        header("location:../subcategory.php");
  
  }
    
}


function update()
{
  global $con;
  
  $id =$_POST['id'];
  $nm= $_POST['name'];
  $descr=$_POST['desc'];

  $qry="update category set name='$nm',descr='$descr' where id=$id";
  $result = mysqli_query($con, $qry);
  
  header("location:../category_search.php");
    
}
?>