<?php
session_start();
$dname=$_POST['dname'];
$did=$_POST['did'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO department(dname,did) VALUES ('".$dname."','".$did."')";

if(mysqli_query($conn,$sql)){
    ?>
      <script type="text/javascript">
      alert("Department was added succesfully");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
