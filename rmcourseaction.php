<?php
 session_start();
$cid=$_POST['cid'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$query="SELECT * FROM course WHERE cid='$cid' ";
$result=mysqli_query($conn,$query);
$nor=mysqli_num_rows($result);
if($nor==0){
      ?>
      <script type="text/javascript">
      alert("You have entered invalid id of course");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
$sql = "DELETE FROM course WHERE cid='$cid'";

if(mysqli_query($conn,$sql)){
      ?>
      <script type="text/javascript">
      alert("Course was removed successfully");
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
