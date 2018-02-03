<!DOCTYPE html>
<html>
<head>
</head>

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
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");

$cid=$_POST['attendance'];
?>
 <header>
   <h1 style="font-size:60px;" ><center><?php echo $cid;?></center></h1>
</header>
<?php
$result = mysql_query("SELECT * FROM attendance WHERE courseid='$cid'");
if (mysql_num_rows($result) > 0) {
    // output data of each row
   
    ?>
    <form action="attendanceaction.php" method="POST" style="text-align: center;">
    <input type="hidden" name="courseid" value="<?php echo "$cid";?>"> <br>
    Attendance Date:<input type="Date" name="date"><br><br><br>
    
    <table border="2" align="center" cellpadding="5" cellspacing="5">
        <tr>
        <th> Student Roll No </th>
        <th> Student Name</th>
        <th> Present</th>
        <th> Absent</th>       

        </tr>
<?php
    while($row = mysql_fetch_assoc($result)) {
        $srollno=$row["studentrollno"];
        $query = mysql_query("SELECT * FROM student WHERE srollno='$srollno'");
        if (mysql_num_rows($query) > 0) {
    // output data of each row
         while($row = mysql_fetch_assoc($query)) {
          ?>
          <tr>
          <td> <?php echo $srollno; ?></td>
          <td> <?php echo $row['sname']; ?></td>
         <td> <input type="radio" name="<?php echo "$srollno"; ?>" value="present" checked="checked" >Present</td>
         <td> <input type="radio" name="<?php echo "$srollno"; ?>" value="absent" >Absent</td>
         </tr>
          <?php
        }
      }
      
      else{
        echo "Student name error";
      }
    }
    ?>
    </table>
    <br>
    <input type="submit" name="submit" value="Mark">
    </form>
    <?php
} else {
    echo "No students in the course";
}

?>
<br><br>
  <body style="text-align:center;">
<a href="markattendance.php" style="text-align:center;">Back to Attendance Page.  </a><br><br>
</body>
</html>

