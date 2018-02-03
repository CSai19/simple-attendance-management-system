<!DOCTYPE html>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['username']  .'!';
?>
</div>
<br>
<br>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<a href="logout.php"><button>Logout</button></a>
</div>
<html>
<head>
	<title>Admin Home</title>
</head>
<header>
   <h1 style="font-size:60px;" ><center>Admin Home</center></h1>
</header>
<body style="text-align: center;">
<a href="addfaculty.php">Add Faculty</a><br><br>
<a href="addhod.php">Add HOD</a><br><br>
<a href="addcourse.php">Add Course</a><br><br>
<a href="addstudent.php">Add Student</a><br><br>
<a href="adddepartment.php">Add Department</a><br><br>
<a href="rmfaculty.php">Remove Faculty</a><br><br>
<a href="rmhod.php">Remove HOD</a><br><br>
<a href="rmcourse.php">Remove Course</a><br><br>
<a href="rmstudent.php">Remove Student</a><br><br>
<a href="rmdepartment.php">Remove Department</a><br><br>
</body>
</html>