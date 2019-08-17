<?php
include('dbconn.php');
?>
<link rel="stylesheet" type="text/css" href="prg1.css"/>
<div id="body">
<h1 align="center">Admin Page</h1>
			<table align="center" border="1">
				<th>STUDENTS ID</th>
				<th>STUDENTS First Name</th>
                <th>STUDENTS Last Name</th>
				<th>STUDENTS Email ID</th>
                <th>Details</th>
		<?php
		$sql = "SELECT * FROM student_details";
		$result = mysqli_query($conn,$sql);
		if($result){
				while($rws = mysqli_fetch_array($result))
					echo "<tr><td>".$rws[0]."</td><td> ".$rws[3]."</td><td>".$rws[4]."</td><td>".$rws[11]."</td><td>"."<a href='studentdetails.php?id=".$rws[0]."'>details</a>"."</td></tr>";
		}else
			echo "Error :".mysqli_error($conn);
		?>
		</table>
<ul>
        <li><a href="logout.php">Logout</a></li>
        </ul>
</div>