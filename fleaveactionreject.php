<!DOCTYPE html>
<html>
<body>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['fusername']  .'!';
?>
</div>
<?php

$fname=$_SESSION['fusername'];
$studentrollno=$_POST['studentrollno'];
$cname=$_POST['cname'];
$fromdate=$_POST['fromdate'];
$reject="rejected";
$pending="pending";
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");

$query= mysql_query("SELECT * FROM leav WHERE fname='$fname' AND studentrollno='$studentrollno' AND cname='$cname'");
  if (mysql_num_rows($query) > 0) {
   
        while($row = mysql_fetch_assoc($query)) {
          
          $que= mysql_query("UPDATE leav SET status='$reject' WHERE fname='$fname' AND studentrollno='$studentrollno' AND cname='$cname' AND status='$pending' AND fromdate='$fromdate'");
          ?>
      <script type="text/javascript">
      alert("Request is Rejected Successfully!!!");
      window.location.href="fleaverequests.php";
      </script>
      <?php
          
      }
    }else {
      echo "error";
    }

   ?>
</body>
</html>
