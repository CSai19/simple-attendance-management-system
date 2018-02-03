<?php
 session_start();
$fid=$_POST['fid'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$query="SELECT * FROM faculty WHERE fid='$fid' ";
$result=mysqli_query($conn,$query);
$nor=mysqli_num_rows($result);
if($nor==0){
      ?>
      <script type="text/javascript">
      alert("You have entered invalid id of faculty");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{

while($row = mysqli_fetch_assoc($result)) {
$fusername=$row['fusername'];
}   

$sql = "DELETE FROM faculty WHERE fid='$fid'";
$que = "DELETE FROM facultyprofile WHERE fusername='$fusername'";

if(mysqli_query($conn,$que)){
     
}
else{
echo 'Error';
}

if(mysqli_query($conn,$sql)){
      ?>
      <script type="text/javascript">
      alert("faculty was removed successfully");
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
