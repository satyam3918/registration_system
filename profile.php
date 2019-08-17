<?php
include('dbconn.php');
if(empty($_SESSION['login']))
    header('Location:regform.php');

?>
<html>
	<head>
		<title>Profile Page</title>
        <link rel="stylesheet" type="text/css" href="prg1.css"/>
	</head>
	<body>
        <div id="body"> 
        <h1>Welcome <?php echo $_SESSION['data'][0]." ".$_SESSION['data'][1];?></h1>
        <h1 align="center">Profile Details</h1>
			<table align="center" border="1">
				<th>ID</th>
				<th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
				<th>Email</th>
                <th>Mobile No</th>
                <th>Update Data</th>
		<?php
        $userID = $_SESSION['data'][2];    
		$sql = "SELECT * FROM student_details WHERE student_id='$userID' ";
		$result = mysqli_query($conn,$sql);
		if($result){
				while($rws = mysqli_fetch_array($result)){
					echo "<tr><td>".$rws[0]."</td><td> ".$rws[3]."</td><td>".$rws[4]."</td><td>".$rws[5]."</td><td>".$rws[11]."</td><td>".$rws[14]."</td><td>"."<a href='updateData.php?id=".$rws[0]."'>Update</a>"."</td></tr>";
                    $courseName = $rws[27];
                }
                    
		}else
			echo "Error :".mysqli_error($conn);
                
            
                
                
                
		?>
		</table>
        <h1 align="center"></h1>
        <hr/>
        <h1><?php echo $courseName;?></h1>
        <h3>Payment Mode :</h3>
        <form method="post">
        <table>
        <tr>
            <td>Cash <input type="radio" name="pay" value="1"/></td>
            </tr>
            <tr>
            <td>Transfer to Bank <input type="radio" name="pay" value="2"/></td>
            </tr>
            <tr>
            <td></td>
                <td><input type="submit" name="btn" value="OK"/></td>
            </tr>
        </table>
        </form>
        <?php
        $sql= "SELECT * FROM course WHERE course_name='$courseName'";
                $result= mysqli_query($conn,$sql);
                if($result){
            if(!empty($_REQUEST['btn']) && $_REQUEST['pay']==1){
                $rws = mysqli_fetch_array($result);
                echo "Rs. ".$rws[2]." is due valid till 14.08.2018 at our training centre";
                }
            if(!empty($_REQUEST['btn']) && $_REQUEST['pay']==2){
               echo "Transfer to this Account Name: SW Training Centre<br/>";
                echo "Account Number: 4110085000074652<br/>";
                echo "Axis bank, Branch: Laketown<br/>";
                
                
            }
                }
        ?>
        <ul>
        <li><a href="logout.php">Logout</a></li>
        </ul>
            </div>
	</body>
</html>