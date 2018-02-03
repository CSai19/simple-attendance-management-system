<?php
session_start();
$fname=$_POST['fname'];
$departmentid=$_POST['departmentid'];
$fusername=$_POST['fusername'];
$password=$_POST['password'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO faculty(fusername,fname,departmentid) VALUES ('".$fusername."','".$fname."','".$departmentid."')";

$query="INSERT INTO facultyprofile(fusername,fpassword) VALUES ('".$fusername."','".$password."')";

if(mysqli_query($conn,$query)){
    
}
else{
echo 'Error';
}

if(mysqli_query($conn,$sql)){
    ?>
      <script type="text/javascript">
      alert("Faculty was added succesfully");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
