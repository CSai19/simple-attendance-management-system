<!DOCTYPE html>
<head>
<style type="text/css">
  .login-page {
  width: 410px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #4da6ff;
  max-width: 560px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  border: 1px solid black;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 50%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #ff9933;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #ffffff;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #ffffff;
  color:#000000;
}
   </style>
   </head>
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
<html>
<head>
   
</head>

<header>
   <h1 style="font-size:60px;" ><center>Student Profile Update</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
 <?php
$susername=$_SESSION['susername'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$result=mysql_query("SELECT * FROM studentprofile WHERE susername='$susername'"); 
$row = mysql_fetch_assoc($result);
	
?>
<form  action="updatestudentaction.php" method="POST">

Rollno:
<input type="text" name="srollno" value="<?php  echo $row["susername"];   ?>" disabled/><br><br>
Password:
<input type="text" name="spassword" value="<?php  echo $row['spassword'];  ?>" /><br><br>
EmailId:
<input type="email" name="emailid" value="<?php  echo $row['emailid'];  ?>" /><br><br>
Phone Number:
<input type="text" name="phoneno" value="<?php  echo $row['phoneno'];  ?>" /><br><br>
Parent Phone No:
<input type="text" name="parentphoneno" value="<?php  echo $row['parentphoneno'];  ?>" /><br><br>
Address:
<textarea rows="4" cols="40" name="address">
<?php  echo $row['address'];  ?>
</textarea>
<br><br>
<input type="submit" name="submit" value="Update" />
</form>
<br><br>
   <a href="studenthome.php">Back to Home Page.  </a><br><br>

</body>
</html>
