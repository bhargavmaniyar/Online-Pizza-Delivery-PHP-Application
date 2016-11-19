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
    $ctrid=$_POST['ctrid'];
    $stateid=$_POST['stateid'];
    $cityid=$_POST['cityid'];
    $nm= $_POST['name'];
$descr=$_POST['desc'];

$qry="select * from branch where name='$nm'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0)
 {
 $_SESSION['status']="0";   
 }
   else
   {
       $qry= "insert into branch (name,descr,city_id) values ('$nm','$descr',$cityid)";
       mysqli_query($con, $qry);
        $_SESSION['status']="1";   
   }
if(mysqli_error($con)!=null)
{
    echo mysqli_error($con);
    
}
else
{
header("location:../branch.php");
}
echo "<br/>" .$_SESSION['status'];
}

function edit()
{
  global $con;
  $id=$_GET['id'];
  $qry="select * from branch b,city ci,state s,country c where b.id=$id and ci.id=b.city_id and s.cntry_id=c.id and ci.state_id=s.id";
  echo $qry;
  $result = mysqli_query($con, $qry);
  $_SESSION['ebranch']=  mysqli_fetch_array($result);
  echo mysqli_error($con);
  header("location:../branch.php");
  
}

function del()
{
    global $con;
  $id =$_GET['id'];
  $qry="delete from branch where id=$id";
  $result = mysqli_query($con, $qry);
  header("location:../branch_search.php");
    
}
function select()
{
    header('Content-type: text/html');
  global $con;
  $id=$_GET['cityid'];
  $qry="select * from branch where city_id=$id";
  $result = mysqli_query($con, $qry);
  $a="<option selected='selected'>Select Branch</option>";
  while($row= mysqli_fetch_array($result))
  {
      $a=$a."<option value=$row[0]>$row[1]</option>";
      
  }
  
  echo $a;
  
  
  //header("location:../state.php");
    
}


function update()
{
  global $con;
  
  $id =$_POST['id'];
  $nm= $_POST['name'];
  $descr=$_POST['desc'];
$cityid=$_POST['cityid'];
  $qry="update branch set name='$nm',descr='$descr',city_id=$cityid where id=$id";
  $result = mysqli_query($con, $qry);
  
  header("location:../branch_search.php");
    
}
?>