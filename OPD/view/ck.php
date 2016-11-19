

<?php
setcookie("cookie[1]","cookiethree");
setcookie("cookie[2]","cookietwo");
setcookie("cookie[3]","cookieone");

// print cookies (after reloading page)
$a= $_COOKIE['cookie'];
echo $a[1];

if (isset($_COOKIE["cookie"]))
  {
  foreach ($_COOKIE["cookie"] as $name => $value)
    {
    echo "$name : $value <br />";
    }
  }
  echo date("Y-m-d")."<br>";
  print date("G.i:s", time());
  $a= "1,2,3";
  
?>