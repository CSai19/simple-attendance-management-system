<?php
session_start();
$cname=$_POST['cname'];
$cid=$_POST['cid'];
$departmentid=$_POST['departmentid'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO course(cname,cid,departmentid) VALUES ('".$cname."','".$cid."','".$departmentid."')";

if(mysqli_query($conn,$sql)){
      ?>
      <script type="text/javascript">
      alert("Course was added succesfully");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
