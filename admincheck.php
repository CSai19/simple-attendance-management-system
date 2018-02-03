<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");
$query=mysql_query("SELECT * FROM admin WHERE username='$username'");
$numrows=mysql_num_rows($query);
if($numrows!=0){
  while($row=mysql_fetch_assoc($query)){
    $dbpassword=$row['password'];
  }
  if($password==$dbpassword){
   $_SESSION['username']=$username;
   header("Location: adminhome.php");
   exit();
  }
  else
     {
     	?>
     	<script type="text/javascript">
     	alert("Incorrect password");
     	window.location.href="adminlogin.php";
     	</script>
     	<?php
     }
 
}
else
   
   	{
     	?>
     	<script type="text/javascript">
     	alert("Invaild user");
     	window.location.href="adminlogin.php";
     	</script>
     	<?php
     }
   
mysql_close($conn);
?>
