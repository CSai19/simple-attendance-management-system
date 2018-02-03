<?php
session_start();
$fusername=$_SESSION['fusername'];

$emailid=$_POST['emailid'];
$phoneno=$_POST['phoneno'];

$address=$_POST['address'];
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$query=mysql_query("UPDATE facultyprofile SET fusername='$fusername' , emailid='$emailid' , phoneno='$phoneno' , address='$address' WHERE fusername='$fusername'");

if($query){
  ?>
      <script type="text/javascript">
      alert("updated Successfully");
      window.location.href="facultyhome.php";
      </script>
      <?php
}
else {
  ?>
      <script type="text/javascript">
      alert("Failed to update");
      window.location.href="facultyhome.php";
      </script>
      <?php
}

mysql_close($conn);
?>
