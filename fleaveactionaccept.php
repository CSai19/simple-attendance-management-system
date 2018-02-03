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
$fromdate=$_POST['fromdate'];
$cname=$_POST['cname'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");

$que= mysql_query("SELECT * FROM leav WHERE fname='$fname' AND studentrollno='$studentrollno' AND cname='$cname'");
  if (mysql_num_rows($que) > 0) {
   
        while($row = mysql_fetch_assoc($que)) {
          $accept="accepted";
          $pending="pending";
          $que= mysql_query("UPDATE leav SET status='$accept' WHERE fname='$fname' AND studentrollno='$studentrollno' AND cname='$cname' AND status='$pending' AND fromdate='$fromdate'");
          $fromdate=$row['fromdate'];
          $todate=$row['todate'];
            ?>
      <script type="text/javascript">
      alert("Request is Accepted Successfully!!!");
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
