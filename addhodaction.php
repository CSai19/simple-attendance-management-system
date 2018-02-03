<?php
session_start();
$hodname=$_POST['hodname'];
$hodid=$_POST['hodid'];
$departmentid=$_POST['departmentid'];
$husername=$_POST['husername'];
$hpassword=$_POST['hpassword'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO hod(hodname,hodid,departmentid,husername,hpassword) VALUES ('".$hodname."','".$hodid."','".$departmentid."','".$husername."','".$hpassword."')";

if(mysqli_query($conn,$sql)){
    ?>
      <script type="text/javascript">
      alert("HOD was added succesfully");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
