<?php
 session_start();
$hodid=$_POST['hodid'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$query="SELECT * FROM hod WHERE hodid='$hodid' ";
$result=mysqli_query($conn,$query);
$nor=mysqli_num_rows($result);
if($nor==0){
      ?>
      <script type="text/javascript">
      alert("You have entered invalid id of hod");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
$sql = "DELETE FROM hod WHERE hodid='$hodid'";

if(mysqli_query($conn,$sql)){
      ?>
      <script type="text/javascript">
      alert("hod was removed successfully");
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
