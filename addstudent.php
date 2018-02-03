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
<title>Student </title>
        
</head>
  <body style="text-align: center;">
   
  <form style="text-align: center;" action="addstudentaction.php" method="POST">

    <h1 style="text-align: center;"> Add Student </h1>
    
    <input type="text"  name="sname" placeholder="student name" required> <br><br>

    
    <input type="text"  name="srollno" placeholder="student roll.no" required> <br><br>
    
    <input type="int"  name="departmentid" placeholder="deparment id" required> <br><br>
    
    <input type="text"  name="program" placeholder="program" required> <br><br>
    
    <input type="int"  name="semester" placeholder="semester" required> <br><br>
   
    <input type="password"  name="password" placeholder="password" required> <br><br>
    
    <input type="submit" value="Add Student">

  </form>
  <br><br>
   <a href="adminhome.php">Back to Home Page.  </a><br><br>
 </body>


</html>