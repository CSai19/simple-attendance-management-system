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
<header>
   <h1 style="font-size:60px;" ><center>Attendance</center></h1>
</header>
<?php

$srollno=$_SESSION['susername'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");


$result = mysql_query("SELECT courseid FROM attendance WHERE studentrollno='$srollno'");
if (mysql_num_rows($result) > 0) {
    // output data of each row
  ?>
  <table border="2" align="center" cellpadding="5" cellspacing="5">
<tr>
<th> Course ID </th>
<th> Course Name</th>
<th> Percentage </th>
<th> No of Hours present</th>
<th> NO of Hours taken </th>
<th> Check</th>

</tr>
<?php
   
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
      $percentage=(($hours)/($totalhours))*100;
      else
      $percentage=0;
    ?>
<tr>
<td><?php echo $cid;?> </td>
<td><?php echo $cname;?> </td>
<td><?php echo $percentage;?> </td>
<td><?php echo $hours;?> </td>
<td><?php echo $totalhours;?> </td>


      <form action="viewabsentdates.php" method="POST">
        
          <input type="hidden" name="studentrollno" value="<?php  echo $row["srollno"];   ?>" />
         
          <input type="hidden" name="courseid" value="<?php  echo $cid; ?>" />
          <input type="hidden" name="cname" value="<?php  echo $cname; ?>" />
          
          <td><input type="submit" name="submit" value="Check absent dates" /></td>
          <br>
      </form>
</tr>
     <?php
    }

} else {
    //echo "0 results";
}

?>
</table>
<br><br>
<html>

<body style="text-align:center;">
<a href="studenthome.php" style="text-align:center;">Back to Home Page.  </a><br><br>
</body>
</html>


