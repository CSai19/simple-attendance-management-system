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

$studentrollno=$_SESSION['susername'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$courseid=$_POST['courseid'];
$cname=$_POST['cname'];

$result = mysql_query("SELECT * FROM absentdates WHERE studentrollno='$studentrollno' AND courseid='$courseid'");
if (mysql_num_rows($result) > 0) {
    // output data of each row
      echo $cname;
      echo "<br><br>";
    while($row = mysql_fetch_assoc($result)) {
        
        echo $row['absentdate'];
        echo "<br>";

        }
      

     

} else {
    echo "No absent dates";
}

?>
<br><br>
<a href="sattendance.php">Back to Page.  </a><br><br>

