<?php
 session_start();
$srollno=$_POST['srollno'];

$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$query="SELECT * FROM student WHERE srollno='$srollno' ";
$result=mysqli_query($conn,$query);
$nor=mysqli_num_rows($result);
if($nor==0){
      ?>
      <script type="text/javascript">
      alert("You have entered invalid id of student");
      window.location.href="adminhome.php";
      </script>
      <?php
}
else{
$sql = "DELETE FROM student WHERE srollno='$srollno'";
$que = "DELETE FROM studentprofile WHERE susername='$srollno'";

if(mysqli_query($conn,$que)){
      
}
else{
echo 'Error';
}

if(mysqli_query($conn,$sql)){
      ?>
      <script type="text/javascript">
      alert("student was removed successfully");
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
