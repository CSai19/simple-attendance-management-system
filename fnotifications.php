<!DOCTYPE html>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['fusername']  .'!';
?>
</div>
<br>
<br>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<a href="logout.php"><button>Logout</button></a>
</div>
<?php

$fusername=$_SESSION['fusername'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");

$que= mysql_query("SELECT fname FROM faculty WHERE fusername='$fusername'");
  if (mysql_num_rows($que) > 0) {
   
        while($row = mysql_fetch_assoc($que)) {
          $fname=$row['fname'];
      }
    }
$status="pending";
$que= mysql_query("SELECT * FROM leav WHERE fname='$fname' AND status='$status'");

if (mysql_num_rows($que) > 0) {
        
        while($row = mysql_fetch_assoc($que)) {
          
         echo $row['studentrollno'];
         echo "  is requested leave for course  ";
         echo $row['cname'];
         echo "   from   ";
         echo $row['fromdate'];
         echo "  to  ";
         echo $row['todate'];
         echo "<br>";
       
        }
} else {
  echo "No new Notifications";
}



?>
<br><br>
   <a href="facultyhome.php">Back to Home Page.  </a><br><br>

