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
<title>Remove Department</title>
        
</head>
  <body style="text-align: center;">
   
  <form style="text-align: center;" action="rmdepartmentaction.php" method="POST">

      <h1 style="text-align: center;"> Remove Department</h1>
    
    <input type="text"  name="did" placeholder="Department ID" required> <br><br>


    <!--<label for="Date of Joining" name="dateofjoining">Date of Joining</label>
    <input type="date" id="dateofjoining" name="dateofjoing" placeholder="Date of Joining"> 


      <input id="date" name="date">

<script type="text/javascript">
  document.getElementById('date').value = Date(); </script>
<br><br>
-->
    

    

    <input type="submit" value="Remove Department">

  </form>
<br><br>
   <a href="adminhome.php">Back to Home Page.  </a><br><br>

 </body>


</html>