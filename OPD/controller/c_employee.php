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
    case 'l':
            login();
            break;
    case 'p':
            changepassword();
            break;
    case 'o':
            logout();
            break;
        
}

function  changepassword()
{
    global $con;
    $old=$_POST['old'];
    $new=$_POST['new'];
    $id=$_SESSION['id'];
    
    $qry="select * from employee where id='$id' and password='$old'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 $row=  mysqli_fetch_array($result);
 
 if(mysqli_num_rows($result)>0)
 {
    $qry="update employee set password = '$new' where id=$id";
    mysqli_query($con, $qry);
    $_SESSION['status']="1";   
 }   
 else {
    $_SESSION['status']="0";   
     
 }
 header("location: ../changepassword.php");

    
    
}


function logout()
{
    session_destroy();
    header("location:../index.php");
}
function login()
{
    global $con;
    $un=$_POST['username'];
    $ps=$_POST['password'];
    
    $qry="select * from employee where email='$un' and password='$ps'";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 $row=  mysqli_fetch_array($result);
 $_SESSION['name']= $row[1] ." ". $row[2];
 $_SESSION['id']=$row[0];
 $_SESSION['branch_id']=$row[4];
 
 
 $qry="select * from branch where id=$row[4]";
echo $qry;
 $result= mysqli_query($con,$qry);
 
 $row1=  mysqli_fetch_array($result);
 $_SESSION['branch_name']=$row1[1];
 
 if(mysqli_num_rows($result)>0)
 {
     
    header("location:../dash.php");
     
 }   
 else
 {
     $_SESSION['ack']="error";
   header("location:../index.php");
 }
}



function insert()
{
    global  $con;
    $brid=$_POST['brid'];
    $fname=$_POST['fname'];
    $lname= $_POST['lname'];
    $cntct= $_POST['contact'];
    $email= $_POST['email'];
    $pass= '123';
   //str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890")


$qry="select * from employee where br_id=$brid";
echo $qry;
 $result= mysqli_query($con,$qry);
 echo mysqli_num_rows($result);
 if(mysqli_num_rows($result)>0)
 {
 $_SESSION['status']="0";   
 }
   else
   {
       $qry= "insert into employee (fname,lname,contact_no,br_id,email,password) values ('$fname','$lname','$cntct',$brid,'$email','$pass')";
       mysqli_query($con, $qry);
        $_SESSION['status']="1";   
   }
if(mysqli_error($con)!=null)
{
    echo mysqli_error($con);
    
}
else
{
header("location:../employee.php");
}
echo "<br/>" .$_SESSION['status'];
}

function edit()
{
  global $con;
  $id=$_GET['id'];
  $qry="select * from employee e,branch b,city ci,state s,country c where e.br_id=b.id and b.city_id=ci.id and s.cntry_id=c.id and ci.state_id=s.id and e.id=$id";
  echo $qry;
  $result = mysqli_query($con, $qry);
  $_SESSION['eemployee']=mysqli_fetch_array($result);
  header("location:../employee.php");
  
}

function del()
{
    global $con;
  $id =$_GET['id'];
  $qry="delete from employee where id=$id";
  $result = mysqli_query($con, $qry);
  header("location:../employee_search.php");
    
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
  $brid=$_POST['brid'];
    $fname=$_POST['fname'];
    $lname= $_POST['lname'];
    $cntct= $_POST['contact'];
    $email= $_POST['email'];
    $qry="update employee set fname='$fname',lname='$lname',contact_no='$cntct',email='$email',br_id=$brid where id=$id";
    echo  $qry;
  $result = mysqli_query($con, $qry);
  echo mysqli_error($con);
  header("location:../employee_search.php");
    
}
?>