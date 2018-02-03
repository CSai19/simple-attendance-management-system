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
   <h1 style="font-size:60px;" ><center>Student Enrollment</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="enrollstudentsaction.php" method="POST">
      <input type="text" placeholder="studentrollno" name="srollno" required /><br><br>
      <select name="courseid" required>
		  <?php
         $conn=mysql_connect("localhost","root","") or die("Could not connect!");
         mysql_select_db("dbms") or die("Could not find db");

            $fusername=$_SESSION['fusername'];
			$result = mysql_query("SELECT fid FROM faculty WHERE fusername='$fusername'");
			if (mysql_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysql_fetch_assoc($result)) {
			        $fid=$row['fid'];
			    }
			} else {
			    echo "0 results";
			}
           $result= mysql_query("SELECT * FROM course WHERE facultyid='$fid'");
           if (mysql_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysql_fetch_assoc($result)) {
			       ?>
			       <option value='<?php echo $row['cid'];?>'><?php echo $row['cname'];?> </option>
			       <?php
			    }
			} else {
			    echo "0 results";
			}
		  ?>
            


	  </select><br><br>
      <input type="submit" value="Enroll"><br>
       <br><br>
   <a href="facultyhome.php">Back to Home Page.  </a><br><br>
    </form>
  </div>
</div>
</body>
<html>
