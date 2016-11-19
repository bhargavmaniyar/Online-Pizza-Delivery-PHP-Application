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
    $nm= $_POST['name'];
$descr=$_POST['desc'];

$qry="select * from city where name='$nm'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0)
 {
 $_SESSION['status']="0";   
 }
   else
   {
       $qry= "insert into city (name,descr,state_id) values ('$nm','$descr',$stateid)";
       mysqli_query($con, $qry);
        $_SESSION['status']="1";   
   }
if(mysqli_error($con)!=null)
{
    echo mysqli_error($con);
    
}
else
{
header("location:../city.php");
}
echo "<br/>" .$_SESSION['status'];
}

function edit()
{
  global $con;
  $id=$_GET['id'];
  $qry="select * from city ci,state s,country c where ci.id=$id and s.cntry_id=c.id and ci.state_id=s.id";
  echo $qry;
  $result = mysqli_query($con, $qry);
  $_SESSION['ecity']=  mysqli_fetch_array($result);
  header("location:../city.php");
  
}

function del()
{
    global $con;
  $id =$_GET['id'];
  $qry="delete from city where id=$id";
  $result = mysqli_query($con, $qry);
  header("location:../city_search.php");
    
}
function select()
{
    header('Content-type: text/html');
  global $con;
  $stateid=$_GET['stateid'];
  $qry="select * from city where state_id=$stateid";
  $result = mysqli_query($con, $qry);
  $a="<option>Select City</option>";
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
$stateid=$_POST['stateid'];
  $qry="update city set name='$nm',descr='$descr',state_id=$stateid where id=$id";
  $result = mysqli_query($con, $qry);
  
  header("location:../city_search.php");
    
}
?>