<?php
session_start();
$srollno=$_SESSION['susername'];
$fname=$_POST['fname'];
$cname=$_POST['cname'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$reason=$_POST['reason'];
$status="pending";
$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}

$sql="INSERT INTO leav(studentrollno,fname,cname,fromdate,todate,reason,status) VALUES ('".$srollno."','".$fname."','".$cname."','".$fromdate."','".$todate."','".$reason."','".$status."')";

if(mysqli_query($conn,$sql)){
    ?>
      <script type="text/javascript">
      alert("Leave was applied succesfully");
      window.location.href="studenthome.php";
      </script>
      <?php
}
else{
echo 'Error';
}

mysqli_close($conn);
?>
