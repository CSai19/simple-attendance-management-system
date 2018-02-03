<?php
session_start();

$conn=mysql_connect("localhost","root","") or die("Could not connect!");
mysql_select_db("dbms") or die("Could not find db");

$cid = $_POST['courseid'];
$date = $_POST['date'];

mysql_query("UPDATE course SET totalhourstaken=totalhourstaken+1 WHERE cid='$cid'");

$result = mysql_query("SELECT * FROM attendance WHERE courseid='$cid'");
if (mysql_num_rows($result) > 0) {
    while($row = mysql_fetch_assoc($result)) {
        $srollno=$row["studentrollno"];
        $query = mysql_query("SELECT * FROM student WHERE srollno='$srollno'");
        if (mysql_num_rows($query) > 0) {
    // output data of each row
         while($row = mysql_fetch_assoc($query)) {
          $status=$_POST["$srollno"];
          if($status=="present"){
                  

                  if (mysql_query("UPDATE attendance SET noofhourspresent=noofhourspresent+1 WHERE courseid='$cid' AND studentrollno='$srollno'")) {
                      //echo "Attendance updated successfully";
                  } else {
                      //echo "Error updating record: ";
                  }

          }
          else{
               
               "INSERT INTO absentdates (courseid,studentrollno, absentdate)
                VALUES ('$cid', '$srollno', '$date')";

                if (mysql_query( "INSERT INTO absentdates (courseid,studentrollno, absentdate)
                VALUES ('$cid', '$srollno', '$date')")) {
                    //echo "Absent record created successfully";
                } else {
                    //echo "Error: " ;
                }
          }
        }
        ?>
      <script type="text/javascript">
      alert("Attendance marked successfully");
      window.location.href="markattendance.php";
      </script>
      <?php
      }
      
      else{
        echo "Student name error";
      }
    }

} else {
    //echo "No students in the course";
      ?>
      <script type="text/javascript">
      alert("No students in the course");
      window.location.href="markattendance.php";
      </script>
      <?php
}

?>
