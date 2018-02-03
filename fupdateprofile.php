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
<html>
<head>
   
</head>

<header>
   <h1 style="font-size:60px;" ><center>Faculty Profile Update</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
 <?php
$fusername=$_SESSION['fusername'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$result=mysql_query("SELECT * FROM facultyprofile WHERE fusername='$fusername'"); 
$row = mysql_fetch_assoc($result);
  
?>
<form  action="updatefacultyaction.php" method="POST">

Faculty Name:
<input type="text" name="srollno" value="<?php  echo $row["fusername"];   ?>" disabled/><br><br>
EmailId:
<input type="email" name="emailid" value="<?php  echo $row['emailid'];  ?>" /><br><br>
Phone Number:
<input type="text" name="phoneno" value="<?php  echo $row['phoneno'];  ?>" /><br><br>
Address:
<textarea rows="4" cols="50" name="address">
<?php  echo $row['address'];  ?>
</textarea>
<br><br>
<input type="submit" name="submit" value="Update" />
</form>
<br><br>
   <a href="facultyhome.php">Back to Home Page.  </a><br><br>

</body>
</html>
