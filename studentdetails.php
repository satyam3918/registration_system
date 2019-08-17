<?php
include('dbconn.php');
$id= $_REQUEST['id'];
$sql = "SELECT * FROM student_details WHERE student_id='$id'";
		$result = mysqli_query($conn,$sql);
		if($result){
				while($rws = mysqli_fetch_array($result))
					echo "<tr><td>Name : ".$rws[3]." </td><td>".$rws[4].". </td><td>Email : ".$rws[11]." </td></tr><br/>";
            
		}else
			echo "Error :".mysqli_error($conn);
$sql1="SELECT * FROM course WHERE course_id='$id'";
$result1= mysqli_query($conn,$sql1);
if($result1){
    while($rws = mysqli_fetch_array($result1))
    echo "<tr><td>Course: ".$rws[1].". </td><td> Payment due: ".$rws[2]."</td></tr>";
} else
    echo "Error :".mysqli_error($conn);
?>