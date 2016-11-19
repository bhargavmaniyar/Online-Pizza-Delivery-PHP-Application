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
    $catid=$_POST['catid'];
    $nm= $_POST['name'];
$descr=$_POST['desc'];

$qry="select * from sub_category where name='$nm'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0)
 {
 $_SESSION['status']="0";   
 }
   else
   {
       $qry= "insert into sub_category (name,descr,cat_id) values ('$nm','$descr',$catid)";
       mysqli_query($con, $qry);
        $_SESSION['status']="1";   
   }
if(mysqli_error($con)!=null)
{
    echo mysqli_error($con);
    
}
else
{
header("location:../subcategory.php");
}
echo "<br/>" .$_SESSION['status'];
}

function edit()
{
  global $con;
  $id=$_GET['id'];
  $qry="select * from sub_category s,category c where s.id=$id and s.cat_id=c.id";
  $result = mysqli_query($con, $qry);
  $_SESSION['esubcat']=  mysqli_fetch_array($result);
  header("location:../subcategory.php");
  
}

function del()
{
    global $con;
  $id =$_GET['id'];
  $qry="delete from sub_category where id=$id";
  $result = mysqli_query($con, $qry);
  header("location:../subcat_search.php");
    
}
function select()
{
    header('Content-type: text/html');
  global $con;
  $catid=$_GET["catid"];
  $qry="select * from sub_category where cat_id=$catid";
  $result = mysqli_query($con, $qry);
  $a="<option selected='selected'>Select Sub-Cateogry</option>";
  while($row= mysqli_fetch_array($result))
  {
      $a=$a."<option value=$row[0]>$row[1]</option>";
      
  }
  
  echo $a;
    
}


function update()
{
  global $con;
  
  $id =$_POST['id'];
  $nm= $_POST['name'];
  $descr=$_POST['desc'];
$catid=$_POST['catid'];
  $qry="update sub_category set name='$nm',descr='$descr',cat_id=$catid where id=$id";
  $result = mysqli_query($con, $qry);
  
  header("location:../subcat_search.php");
    
}
?>