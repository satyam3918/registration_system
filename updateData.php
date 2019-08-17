<?php
include('dbconn.php');
$userID=$_REQUEST['id'];
if(!empty($_REQUEST['updateBtn'])){
    $fname= $_REQUEST['fname'];
    $lname=$_REQUEST['lname'];
    $addr=$_REQUEST['addr'];
    $mobno=$_REQUEST['mobno'];
   
    $sql= "UPDATE student_details SET first_name='$fname', last_name='$lname', address='$addr', mobile_no='$mobno' WHERE student_id='$userID'";
    mysqli_query($conn,$sql);
    header('Location:profile.php');
    
}
$sql="SELECT * FROM student_details WHERE student_id='$userID' ";
$result= mysqli_query($conn,$sql);
$rws= mysqli_fetch_array($result);
?>
<html>
<head>
    <title>Update Data</title>
    </head>
    <body>
    <form>
        <table>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="fname" value="<?php echo $rws[3];?>"/></td></tr>
            <tr>
            <td>Last Name</td>
                <td><input type="text" name="lname" value="<?php echo $rws[4];?>"/></td></tr>
            <tr>
            <td>Address</td>
            <td><input type="text" name="addr" value="<?php echo $rws[5];?>"/></td>
            </tr>
            <tr>
            <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $rws[11];?>" disabled/></td></tr>
            <tr>
            <td>Mobile No</td>
                <td><input type="text" name="mobno" value="<?php echo $rws[14];?>"/></td>
            </tr>
            <tr>
            <td></td>
            <td><input type="hidden" name="id" value="<?php echo $userID;?>"/><input type="submit" name="updateBtn" value="Update Data"/></td>
            </tr>
        </table>
        </form>
        
    </body>
</html>