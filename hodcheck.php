<?php
session_start();
$husername=$_POST['husername'];
$hpassword=$_POST['hpassword'];
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$query=mysql_query("SELECT * FROM hod WHERE husername='$husername'");
$numrows=mysql_num_rows($query);
if($numrows!=0){
  while($row=mysql_fetch_assoc($query)){
    $dbpassword=$row['hpassword'];
  }
  if($hpassword==$dbpassword){
   $_SESSION['husername']=$husername;
   header("Location: hodhome.php");
   exit();
  }
  else
     {
     	?>
     	<script type="text/javascript">
     	alert("Incorrect password");
     	window.location.href="hodlogin.php";
     	</script>
     	<?php
     }
 
}
else
   
   	{
     	?>
     	<script type="text/javascript">
     	alert("Invaild user");
     	window.location.href="hodlogin.php";
     	</script>
     	<?php
     }
   
mysql_close($conn);
?>
