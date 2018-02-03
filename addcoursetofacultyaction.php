
<?php
session_start();
$cid=$_POST["cid"];
$fname=$_POST["fname"];
$slot=$_POST["slot"];
$conn=mysqli_connect("localhost","root","","dbms");

if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
$sql1 = "SELECT fid FROM faculty WHERE fname='$fname'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $facultyid=$row['fid'];
        }
   }     else{
            echo "Error";
      }


$sql = "SELECT * FROM course WHERE cid='$cid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (!empty($row["facultyid"])) {
        	?>
        <script type="text/javascript">
        alert("Course was already assigned");
        window.location.href="hodhome.php";
        </script>
        <?php
        }
        else{
            $query = "UPDATE course SET facultyid='$facultyid' , slot='$slot' WHERE cid='$cid'";   
        	if (mysqli_query($conn, $query)) {
            ?>
            <script type="text/javascript">
            alert("Course was successfully assigned");
            window.location.href="hodhome.php";
            </script>
            <?php
			} else {
    		echo 'Error';
			}
        }
    }
} else {
         ?>
        <script type="text/javascript">
        alert("You have entered invalid course id");
        window.location.href="hodhome.php";
        </script>
        <?php
     
}
?>
