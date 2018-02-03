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
   <h1 style="font-size:60px;" ><center>Student Leave Request</center></h1>
</header>

<body id="b">
<br>

<div class="login-page" style="text-align:center;">
  <div class="form">
      <form class="login-form" action="sleaverequestaction.php" method="POST">
      Faculty Name:<input type="text" placeholder="Faculty Name" name="fname" required /><br><br>

      Course Name:
      <select name="cname" required>
      <?php
         $conn=mysql_connect("localhost","root","") or die("Could not connect!");
         mysql_select_db("dbms") or die("Could not find db");

      $susername=$_SESSION['susername'];
      $result = mysql_query("SELECT courseid FROM attendance WHERE studentrollno='$susername'");
      if (mysql_num_rows($result) > 0) {
          // output data of each row
          while($row = mysql_fetch_assoc($result)) {
             $cid=$row['courseid'];
             $result1= mysql_query("SELECT * FROM course WHERE cid='$cid'");
           if (mysql_num_rows($result1) > 0) {
          // output data of each row
          while($row1 = mysql_fetch_assoc($result1)) {
             ?>
             <option value='<?php echo $row1['cname'];?>'><?php echo $row1['cname'];?> </option>
             <?php
          }
      } else {
          echo "0 results";
      }
          }
      } else {
          echo "0 results";
      }
          
      ?>
      </select><br><br>
      From Date:<input type="date" placeholder="From Date" name="fromdate" required /><br><br>
      To Date:<input type="date" placeholder="To Date" name="todate" required /><br><br>
      <textarea name="reason" placeholder="Reason for Leave" rows="7" cols="30" required></textarea><br><br>
      <input type="submit" value="Request"><br><br>
       
    </form>
    <br><br>
    <a href="studenthome.php">Back to Home Page.  </a><br><br>

  </div>
</div>
</body>
<html>
