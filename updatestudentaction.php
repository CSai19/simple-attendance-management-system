<?php
session_start();
$susername=$_SESSION['susername'];
$srollno=$susername;
$spassword=$_POST['spassword'];
$emailid=$_POST['emailid'];
$phoneno=$_POST['phoneno'];
$parentphoneno=$_POST['parentphoneno'];
$address=$_POST['address'];
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$query=mysql_query("UPDATE studentprofile SET susername='$srollno' ,spassword='$spassword' ,emailid='$emailid' , phoneno='$phoneno' , parentphoneno='$parentphoneno' , address='$address' WHERE susername='$susername'");

if($query){
  ?>
      <script type="text/javascript">
      alert("updated Successfully");
      window.location.href="studenthome.php";
      </script>
      <?php
}
else {
  ?>
      <script type="text/javascript">
      alert("Failed to update");
      window.location.href="studenthome.php";
      </script>
      <?php
}

mysql_close($conn);
?>
