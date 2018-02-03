<?php
session_start();
$srollno=$_POST['srollno'];
$courseid=$_POST['courseid'];
$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$query="SELECT * FROM attendance WHERE studentrollno='$srollno' ";
$result=mysqli_query($conn,$query);
$nor=mysqli_num_rows($result);
if($nor==0){
      ?>
      <script type="text/javascript">
      alert("student not enroled in the course");
      window.location.href="facultyhome.php";
      </script>
      <?php
}
else{
$sql = "DELETE FROM attendance WHERE studentrollno='$srollno' AND courseid='$courseid'";
$que = "DELETE FROM absentdates WHERE  studentrollno='$srollno' AND courseid='$courseid'";

if(mysqli_query($conn,$que)){
      
}
else{
echo 'Error';
}

if(mysqli_query($conn,$sql)){
      ?>
      <script type="text/javascript">
      alert("student unenrolled successfully");
      window.location.href="facultyhome.php";
      </script>
      <?php
}
else{
echo 'Error';
}
}
mysqli_close($conn);
?>
