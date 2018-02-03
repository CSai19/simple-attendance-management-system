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


$result = mysql_query("SELECT fid FROM faculty WHERE fusername='$fusername'");
     if (mysql_num_rows($result) > 0) {
    // output data of each row
   while($row = mysql_fetch_assoc($result)) {
      $fid=$row['fid'];
  }
} else {
    echo "0 results";
}
?>
<header>
   <h1 style="font-size:60px;" ><center>Your Courses</center></h1>
</header>
  <table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<th> Course ID </th>
<th> Course Name</th>

</tr>
<?php

    $query=mysql_query("SELECT * FROM course WHERE facultyid='$fid'");
    if (mysql_num_rows($query) > 0) {
    while($row = mysql_fetch_assoc($query)) {
       ?>
       <tr>
       <td> <?php echo $row['cid']; ?> </td>
       <td> <?php echo $row['cname']; ?> </td>
       </tr>
      <?php
   
  }
} else {
    echo "0 results";
}
?>
</table>
<?php

mysql_close($conn);
?>
<html>
<head>
   
</head>

<body id="b" style="text-align: center;">
<br><br>
<a href="facultyhome.php">Back to Home Page.  </a><br><br>


</body>
<html>
