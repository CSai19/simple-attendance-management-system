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
   
</head>

<header>
   <h1 style="font-size:60px;" ><center>Add HOD</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="addhodaction.php" method="POST">
      <input type="text" placeholder="HOD Name" name="hodname" required /><br><br>
      <input type="text" placeholder="HOD ID" name="hodid" required /><br><br>
      <input type="text" placeholder="Department Id" name="departmentid" required /><br><br>
      <input type="text" placeholder="User name" name="husername" required /><br><br>
      <input type="Password" placeholder="Password" name="hpassword" required /><br><br>
      <input type="submit" value="Add HOD"><br>
       
    </form>
  </div>
  <br><br>
   <a href="adminhome.php">Back to Home Page.  </a><br><br>
</div>
</body>
<html>
