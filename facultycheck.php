<?php
session_start();
$fusername=$_POST['fusername'];
$fpassword=$_POST['fpassword'];
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$query=mysql_query("SELECT * FROM facultyprofile WHERE fusername='$fusername'");
$numrows=mysql_num_rows($query);
if($numrows!=0){
  while($row=mysql_fetch_assoc($query)){
    $dbpassword=$row['fpassword'];
  }
  if($fpassword==$dbpassword){
   $_SESSION['fusername']=$fusername;
   header("Location: facultyhome.php");
   exit();
  }
  else
     {
      ?>
      <script type="text/javascript">
      alert("Incorrect password");
      window.location.href="facultylogin.php";
      </script>
      <?php
     }
 
}
else
   {
      ?>
      <script type="text/javascript">
      alert("Invalid user");
      window.location.href="facultylogin.php";
      </script>
      <?php
     }
mysql_close($conn);
?>
