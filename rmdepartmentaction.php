<?php
 session_start();
$did=$_POST['did'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$query="SELECT * FROM department WHERE did='$did' ";
$result=mysqli_query($conn,$query);
$nor=mysqli_num_rows($result);
if($nor==0){
      ?>
      <script type="text/javascript">
      alert("You have entered invalid id of department");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
$sql = "DELETE FROM department WHERE did='$did'";

if(mysqli_query($conn,$sql)){
      ?>
      <script type="text/javascript">
      alert("department was removed successfully");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
echo 'Error';
}
}
mysqli_close($conn);
?>
