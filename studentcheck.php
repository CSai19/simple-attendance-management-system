<?php
session_start();
$susername=$_POST['susername'];
$spassword=$_POST['spassword'];
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$query=mysql_query("SELECT * FROM studentprofile WHERE susername='$susername'");
$numrows=mysql_num_rows($query);
if($numrows!=0){
  while($row=mysql_fetch_assoc($query)){
    $dbpassword=$row['spassword'];
  }
  if($spassword==$dbpassword){
   $_SESSION['susername']=$susername;
   header("Location: studenthome.php");
   exit();
  }
  else
     {
      ?>
      <script type="text/javascript">
      alert("Incorrect password");
      window.location.href="studentlogin.php";
      </script>
      <?php
     }
 
}
else
   {
      ?>
      <script type="text/javascript">
      alert("Invalid user");
      window.location.href="studentlogin.php";
      </script>
      <?php
     }
mysql_close($conn);
?>
