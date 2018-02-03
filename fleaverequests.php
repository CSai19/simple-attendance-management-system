<!DOCTYPE html>
<html>
<body>
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
<?php

$fusername=$_SESSION['fusername'];

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");

$que= mysql_query("SELECT fname FROM faculty WHERE fusername='$fusername'");
  if (mysql_num_rows($que) > 0) {
   
        while($row = mysql_fetch_assoc($que)) {
          $fname=$row['fname'];
      }
    }
$status="pending";
$que= mysql_query("SELECT * FROM leav WHERE fname='$fname' AND status='$status'");

if (mysql_num_rows($que) > 0) {
   
        while($row = mysql_fetch_assoc($que)) {
         echo $row['studentrollno'];
         echo "  is requested leave for course  ";
         echo $row['cname'];
         echo "   from   ";
         echo $row['fromdate'];
         echo "  to  ";
         echo $row['todate'];
         echo "   ";
         echo "Reason:   ";
         echo $row['reason'];
         echo "        ";
         ?>
         <form action="fleaveactionaccept.php" method="POST">
        
          <input type="hidden" name="studentrollno" value="<?php  echo $row["studentrollno"];   ?>" />
         
          <input type="hidden" name="cname" value="<?php  echo $row['cname'];  ?>" />
          <input type="hidden" name="fromdate" value="<?php  echo $row['fromdate'];  ?>" />
          <input type="submit" name="submit" value="Accept" />
          <br>
          </form>
          <form action="fleaveactionreject.php" method="POST">
        
          <input type="hidden" name="studentrollno" value="<?php  echo $row["studentrollno"];   ?>" />
         
          <input type="hidden" name="cname" value="<?php  echo $row['cname'];  ?>" />
          <input type="hidden" name="fromdate" value="<?php  echo $row['fromdate'];  ?>" />
          <input type="submit" name="submit" value="Reject" />
          
          </form>
         <?php
         echo "<br>";
        }
} else {
  echo "No new Notifications";
}


?>
<script type="text/javascript">
function accept()
{
  <?php
   $accept="accepted";
   $que= mysql_query("UPDATE leav SET status='$accept' WHERE fname='murali' AND studentrollno='b150970cs' AND cname='CS1001'");
   ?>
   document.getElementById("a").innerHTML = "Accepted";

}

function reject()
{
  <?php
   $reject="rejected";
   $que= mysql_query("UPDATE leav SET status='$reject' WHERE fname='murali' AND studentrollno='b150970cs' AND cname='CS1001'");
   ?>
   document.getElementById("r").innerHTML = "Rejected";

}

</script>
<br><br>
   <a href="facultyhome.php">Back to Home Page.  </a><br><br>
</body>
</html>
