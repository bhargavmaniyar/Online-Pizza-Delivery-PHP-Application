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
    $nm= $_POST['name'];
$descr=$_POST['desc'];

$qry="select * from state where name='$nm'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0)
 {
 $_SESSION['status']="0";   
 }
   else
   {
       $qry= "insert into state (name,descr,cntry_id) values ('$nm','$descr',$ctrid)";
       mysqli_query($con, $qry);
        $_SESSION['status']="1";   
   }
if(mysqli_error($con)!=null)
{
    echo mysqli_error($con);
    
}
else
{
header("location:../state.php");
}
echo "<br/>" .$_SESSION['status'];
}

function edit()
{
  global $con;
  $id=$_GET['id'];
  $qry="select * from state s,country c where s.id='$id' and s.cntry_id=c.id";
  $result = mysqli_query($con, $qry);
  $_SESSION['estate']=  mysqli_fetch_array($result);
  header("location:../state.php");
  
}

function del()
{
    global $con;
  $id =$_GET['id'];
  $qry="delete from state where id=$id";
  $result = mysqli_query($con, $qry);
  header("location:../state_search.php");
    
}
function select()
{
    header('Content-type: text/html');
  global $con;
  $ctrid=$_GET["ctrid"];
  $qry="select * from state where cntry_id=$ctrid";
  $result = mysqli_query($con, $qry);
  $a="<option>Select State</option>";
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
$ctrid=$_POST['ctrid'];
  $qry="update state set name='$nm',descr='$descr',cntry_id=$ctrid where id=$id";
  $result = mysqli_query($con, $qry);
  
  header("location:../state_search.php");
    
}
?>