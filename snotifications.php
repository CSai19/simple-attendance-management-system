<!DOCTYPE html>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['susername']  .'!';
?>
</div>
<br>
<br>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<a href="logout.php"><button>Logout</button></a>
</div>
<?php

$srollno=$_SESSION['susername'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");

$x=0;
$result = mysql_query("SELECT courseid FROM attendance WHERE studentrollno='$srollno'");
if (mysql_num_rows($result) > 0) {
    // output data of each row
    
    while($row = mysql_fetch_assoc($result)) {
        $cid=$row["courseid"];
        $que= mysql_query("SELECT noofhourspresent FROM attendance WHERE courseid='$cid' AND studentrollno='$srollno'");
        if (mysql_num_rows($que) > 0) {
   
        while($row = mysql_fetch_assoc($que)) {
          $hours=$row["noofhourspresent"];
        }
      }

      $quer= mysql_query("SELECT totalhourstaken,cname FROM course WHERE cid='$cid'");
        if (mysql_num_rows($quer) > 0) {
   
        while($row = mysql_fetch_assoc($quer)) {
          $totalhours=$row["totalhourstaken"];
          $cname=$row["cname"];
        }
      }
      if($totalhours>0)
      $percentage=($hours)/($totalhours)*100;
      else
      $percentage=0;

      if($percentage<80.00 && $totalhours!=0){
      echo "Your Attendance for the course:  ";
      echo $cid;
      echo "  is low  ";
      echo $percentage;
      echo "<br>";
      echo "<br>";
      $x=1;
      }
    }
} else {
    
}

$que= mysql_query("SELECT * FROM leav WHERE studentrollno='$srollno'");
  
if (mysql_num_rows($que) > 0) {
   
        while($row = mysql_fetch_assoc($que)) {
         echo "Your Leave request for ";
         echo $row['fname'];
         echo "  to the course  ";
         echo $row['cname'];
         echo "  from   ";
         echo $row['fromdate'];
         echo "   to  ";
         echo $row['todate'];
         echo "  is  ";
         echo $row['status'];
         echo "<br>";

         echo "<br>";

        }
      }else {
      	if($x==0)
         echo "No New notifications";
}


?>
<br><br>
<a href="studenthome.php">Back to Home Page.  </a><br><br>


