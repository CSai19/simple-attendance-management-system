<!DOCTYPE html>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['husername']  .'!';
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
   <h1 style="font-size:60px;" ><center>HOD Home</center></h1>
</header>
<br>
<br>
<body id="b" style="text-align: center;">
<br>
<br>


<a href="addcoursetofaculty.php">Add Course to Faculty. </a><br><br>

</body>
<html>
