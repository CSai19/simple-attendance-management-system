<!DOCTYPE html>
<?php
session_start();
?>
<div class ="message" style="float:right;margin-top: -10px;background-color: rgb(54, 216, 62); border:1px solid green;">
<?php
echo  'Welcome, ' .$_SESSION['husername']  .'!';
?>
<?php
         $conn=mysql_connect("localhost","root","") or die("Could not connect!");
         mysql_select_db("dbms") or die("Could not find db");

            $husername=$_SESSION['husername'];
			$result = mysql_query("SELECT departmentid FROM hod WHERE husername='$husername'");
			if (mysql_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysql_fetch_assoc($result)) {
			        $departmentid=$row['departmentid'];
			    }
			} else {
			    echo "0 results";
			}
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
   <h1 style="font-size:60px;" ><center>Add Course to Faculty</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="addcoursetofacultyaction.php" method="POST">
      <select name="cid">
      <?php
        

            
			$result = mysql_query("SELECT * FROM course WHERE departmentid='$departmentid'");
			if (mysql_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysql_fetch_assoc($result)) {
			    	?>
			       <option value='<?php echo $row['cid'];?>'><?php echo $row['cid'];?> </option>
			       <?php
			        
			    }
			} else {
			    echo "0 results";
			}

     ?>    

     </select><br><br>
     <select name="fname">
     <?php
     
			$result1 = mysql_query("SELECT fname FROM faculty WHERE departmentid='$departmentid'");
			if (mysql_num_rows($result1) > 0) {
			    // output data of each row
			    while($row = mysql_fetch_assoc($result1)) {
			    	?>
			       <option value='<?php echo $row['fname'];?>'><?php echo $row['fname'];?> </option>
			       <?php
			        
			    }
			} else {
			    echo "0 results";
			}

     ?>
     </select><br><br>
      <select name="slot">
      <option value='A'>A </option>
      <option value='B'>B </option>
      <option value='C'>C </option>
      <option value='D'>D </option>
      <option value='E'>E </option>
      <option value='F'>F </option>
      <option value='G'>G </option>
      <option value='H'>H </option>
      </select><br><br>
      <input type="submit" value="Add"><br>
       
    </form>
  </div>
  <br><br>
   <a href="hodhome.php">Back to Home Page.  </a><br><br>
</div>

</body>
<html>
