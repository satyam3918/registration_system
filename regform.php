<?php
include('dbconn.php');
if(!empty($_REQUEST['submitbtn'])){
$val1 = $_REQUEST['tramet'];
$val2 = $_REQUEST['loc'];
$val3 = $_REQUEST['fname'];
$val4 = $_REQUEST['lname'];
$val5 = $_REQUEST['addr'];
$val6 = $_REQUEST['state'];
$val7 = $_REQUEST['gen'];
$val8 = $_REQUEST['city'];
$val9 = $_REQUEST['dob'];
$val10 = $_REQUEST['dis'];
$val11 = $_REQUEST['email'];
$val12 = $_REQUEST['pincode'];
$val13 = $_REQUEST['pass'];
$val14 = $_REQUEST['mobno'];
$val15 = $_REQUEST['tenth'];
$val16 = $_REQUEST['twelve'];
$val17 = $_REQUEST['jee'];
$val18 = $_REQUEST['gradstandard'];
$val19 = $_REQUEST['gradmarks'];
$val20 = $_REQUEST['colloc'];
$val21 = $_REQUEST['colname'];
$val22 = $_REQUEST['cursem'];
$val23 = $_REQUEST['yearofpassing'];
$val24 = $_REQUEST['stramname'];
$val25 = $_REQUEST['done'];
$val26 = $_REQUEST['refered'];
$val27 = $_REQUEST['program'];
$val28 = $_REQUEST['agreement'];
    
    
    $sql= "INSERT INTO course VALUES('','$val27','','')";
    mysqli_query($conn,$sql);
    
$sql = "INSERT INTO student_details VALUES('','$val1','$val2','$val3','$val4','$val5','$val6','$val7','$val8','$val9','$val10','$val11','$val12','$val13','$val14','$val15','$val16','$val17','$val18','$val19','$val20','$val21','$val22','$val23','$val24','$val25','$val26','$val27','$val28')";
	mysqli_query($conn,$sql);
}
if(!empty($_REQUEST['loginBtn'])){
	$userName = $_REQUEST['uName'];
	$userPwd = $_REQUEST['uPassword'];
	$sql = "SELECT email, password, frist_name, last_name, program_name,student_id FROM student_details WHERE email='$userName' AND password='$userPwd'";
    
	$result = mysqli_query($conn,$sql);
	if($result){
		$rws = mysqli_num_rows($result);
		if($rws==1){
             $rws= mysqli_fetch_array($result);
            $_SESSION['data']=array();
           /* $_SESSION['data'][0]=$rws[2];
             $_SESSION['data'][1]=$rws[3];*/
            array_push($_SESSION['data'],$rws[2],$rws[3],$rws[5]);
            $_SESSION['login']=1;
			header('Location:profile.php');
            
        }
		else 
			$error = 1;
	}else
		echo mysqli_error($conn);
    }
if(!empty($_REQUEST['admsubmit'])){
	$userName = $_REQUEST['admin_id'];
	$userPwd = $_REQUEST['admin_pass'];
	$sql = "SELECT admin_user, admin_pass FROM admin WHERE admin_user='$userName' AND admin_pass='$userPwd'";
	$result = mysqli_query($conn,$sql);
	if($result){
		$rws = mysqli_num_rows($result);
		if($rws==1){
             $rws= mysqli_fetch_array($result);
            $_SESSION['data']=array();
           /* $_SESSION['data'][0]=$rws[2];
             $_SESSION['data'][1]=$rws[3];*/
            array_push($_SESSION['data'],$rws[2],$rws[3]);
            $_SESSION['login']=1;
			header('Location:loginA.php');
        }
		else 
			$error = 1;
	}else
		echo mysqli_error($conn);
    }
$fname_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["fname"])) 
    {
        $fname_error = "<font color='red'> enter your frist name </font>";
    }
    else{}
}
$city_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["city"])) 
    {
        $city_error = "<font color='red'> enter your city name </font>";
    }
    else{}
}
$dis_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["dis"])) 
    {
        $dis_error = "<font color='red'> enter your district name </font>";
    }
    else{}
}

$state_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["state"])) 
    {
        $state_error = "<font color='red'> select state </font>";
    }
    else{}
}
$grad_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["gradstandard"])) 
    {
        $grad_error = "<font color='red'> grad standard </font>";
    }
    else{}
}

    $location_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["colloc"])) 
    {
        $location_error = "<font color='red'> select one location </font>";
    }
    else{}
}
$semester_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["cursem"])) 
    {
        $semester_error = "select your current semester";
    }
    else{}
}
$streamname_error = '';
if(isset($_REQUEST["submitbtn"])){
    if(empty($_REQUEST["stramname"])) 
    {
        $streamname_error = "select one stream";
    }
    else{}
}
?>
<html>
<head>
    <title>Summer/Winter Training Centre!!</title>
    <link rel="stylesheet" type="text/css" href="prg.css"/>
    </head>
    <body>
        <div id ="body">
            
    
            <table align="center" width="100%" border="1">
    <form method="post">
        <table align="center" width="980" border="1" >
            <tr>
            <td>
                <table width="100%">
                <tr>
                    <td><img src="logo.jpg" height="60" width="60"/></td>
                    <td><h1 align="center">Summer & Winter Training Centre,Kolkata</h1><a href="home.php"><h4><font color='red'> HOME </font></h4></a></td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
            <td>
                <form method ="post">
                <table width="100%">
                    <h1 align="center" style="color:black;background:yellow">Login Section</h1>
                    <tr>
                    <td>Username</td>
                        <td><input type="text" name="uName" placeholder="Enter your emailID"/> </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="uPassword" placeholder="Enter your password"/></td>
                    </tr>
                    <tr>
                    <td></td>
                        <td><input type="submit" name="loginBtn" value="Login"/></td>
                    </tr>
                <?php
				if(!empty($_REQUEST['loginBtn']) && $error ==1){
			?>
			<tr>
				<td></td>
				<td style="color:red;font-weight:bold;">Check Your Login Details</td>
			</tr>
			<?php
				}
			?>
                </table>
                </form>
                </td>
            </tr>
        </table>
        </form>
               <form method="post">
        <table align="center" width="980" border="1" >
            <tr>
                <td>
            <table width="100%" >
            <tr>
            <td><b>SUMMER TRAINING</b><input type="radio" name="tramet" value="sum" checked></td>
            <td><b>WINTER TRAINING</b><input type="radio" name="tramet" value="win"></td>    
            </tr>    
            </table>    
            <tr>
            <td>
            <table width="100%" border="0">
            <h1 style="color:black;background:yellow;" align="center" >Registration form</h1>
            <tr>
            <td><b>Instructions :</b>
<ul>
<li>Please read the instructions carefully and fill up all relevant sections before submitting the form.</li>
<li>Improperly filled up forms will not be considered.</li>
<li>Students must have a valid e-mail id to register.</li>
<li>After submission, a copy of the form will be mailed to you at your e-mail id.</li>
</ul>
</td>
 </tr>
  </table>
            </td>
            </tr>
            <tr>
                <td>
                <table width="100%" border="0">
                    <tr>
                    <td><b> LOCATION :</b></td>
                    <td>Central kolkata<input type="radio" name="loc" value="ck" checked></td>
                    <td>South kolkata<input type="radio" name="loc" value="sk"></td>
                    <td>North kolkata<input type="radio" name="loc" value="nk"></td>
                    </tr>
                    </table>
                </td>
            </tr>
            <tr>
            <td>
            <table width="100%" border="0">
            <tr>
            <td>First name</td>
            <td><input type="text" name="fname" required <?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['fname']))
                 echo "class='box'";?> /><?php echo "$fname_error" ?> </td>
            <td>Address</td>
            <td><input type="text" name="addr" required <?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['addr']))
                 echo "class='box'";?> /></td>
            </tr>
            <tr>
            <td>Last name</td>
                <td><input type="text" name="lname"<?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['lname']))
                 echo "class='box'";?> /></td>
                <td>State</td>
                <td><select name="state"><option  value="" required >--Select--</option>
		
		<option value="Andaman And Nicobar Island" >Andaman And Nicobar Island </option>
		
		<option value="Andhra Pradesh" >Andhra Pradesh </option>
		
		<option value="Arunachal Pradesh" >Arunachal Pradesh </option>
		
		<option value="Assam" >Assam </option>
		
		<option value="Bihar" >Bihar </option>
		
		<option value="Chhattisgarh" >Chhattisgarh </option>
		
		<option value="Chandigarh" >Chandigarh </option>
		
		<option value="Dadra and Nagar Haveli" >Dadra and Nagar Haveli </option>
		
		<option value="Delhi" >Delhi </option>
		
		<option value="Goa" >Goa </option>
		
		<option value="Gujarat" >Gujarat </option>
		
		<option value="Haryana" >Haryana </option>
		
		<option value="Himachal Pradesh" >Himachal Pradesh </option>
		
		<option value="Jammu Kashmir" >Jammu Kashmir </option>
		
		<option value="Jharkhand" >Jharkhand </option>
		
		<option value="Karnataka" >Karnataka </option>
		
		<option value="Kerala" >Kerala </option>
		
		<option value="Lakshadweep" >Lakshadweep </option>
		
		<option value="Madhya Pradesh" >Madhya Pradesh </option>
		
		<option value="Maharashtra" >Maharashtra </option>
		
		<option value="Manipur" >Manipur </option>
		
		<option value="Meghalaya" >Meghalaya </option>
		
		<option value="Mizoram" >Mizoram </option>
		
		<option value="Nagaland" >Nagaland </option>
		
		<option value="Orissa" >Orissa </option>
		
		<option value="Pondicherry" >Pondicherry </option>
		
		<option value="Punjab" >Punjab </option>
		
		<option value="Rajasthan" >Rajasthan </option>
		
		<option value="Sikkim" >Sikkim </option>
		
		<option value="Tamilnadu" >Tamilnadu </option>
		
		<option value="Tripura" >Tripura </option>
		
		<option value="Uttar Pradesh" >Uttar Pradesh </option>
		
		<option value="Uttaranchal" >Uttaranchal </option>
		
		<option value="West Bengal" >West Bengal </option>
		
		<option value="Others" >Others </option>
		 
 					</select></td><td><?php echo "$state_error" ?></td>
                
            </tr>
            <tr>
            <td>Gender :   Male<input type="radio" name="gen" value="M" checked></td>
                <td>Female <input type="radio" name="gen" value="F"></td>
                <td>City</td>
                <td><input type="text" name="city" required <?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['city']))
                 echo "class='box'";?>/> <?php echo $city_error; ?></td>
            </tr>
                <tr>
                <td>Date of Birth</td>
                <td><input type="date" name="dob" required ></td> 
                    <td>District          </td>
                    <td><input type="text" name="dis"><?php echo $dis_error;  ?></td>
                </tr>
                <tr>
                <td>Email</td>
                    <td><input type="email" name="email" required <?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['email']))
                 echo "class='box'";?>/></td>
                    <td>Pin code</td>
                    <td><input type="text" name="pincode" required ></td>
                </tr>
                <tr>
                <td>Password</td>
                    <td><input type="password" name="pass" required <?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['pass']))
                 echo "class='box'";?>/></td>
                    <td>Mobile no     </td>
                    <td><input type="text" name="mobno" required <?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['mobno']))
                 echo "class='box'";?>/></td>
                </tr>
                </table>
                <table width="100%"border="0">
                <h1 style="color:black;background:yellow;" align="center" >Educational details</h1>
                    <tr>
                    <td>Class 10th marks</td>
                        <td><input type="text" name="tenth" placeholder="% or C.G.P.A" required  ></td>
                        <td>Class 12th marks</td>
                        <td><input type="text" name="twelve" placeholder="% or C.G.P.A" required ></td>
                    </tr>
                    <tr>
                    <td>JEE rank or equivalent</td>
                        <td><input type="text" name="jee" required ></td>
                    </tr>
                    <tr>
                    <td>Degree</td>
                        <td><select name="gradstandard">
                          <option value="" required >Select</option>
            
		            <option value="B.Tech">B.Tech</option>
		        
		            <option value="B.E">B.E</option>
		        
		            <option value="MCA">MCA</option>
		        
		            <option value="BCA">BCA</option>
		        
		            <option value="Diploma">Diploma</option>
		        
		            <option value="B.SC">B.SC</option>
		        
		            <option value="M.Tech">M.Tech</option>
                            </select>
		         
<?php echo "$grad_error"?></td>
                        <td>Graduation marks</td>
                        <td><input type="text" placeholder="marks in %" name="gradmarks"></td>
                    </tr>
                    <tr>
                    <td>College Location</td>
                        <td><select name="colloc" required >
      <option value="">--Select Location--</option>
	    
					<option value="Andaman and Nicobar Island" > Andaman and Nicobar Island</option>                                
                  
					<option value="Andhra Pradesh" > Andhra Pradesh</option>                                
                  
					<option value="Arunachal Pradesh" > Arunachal Pradesh</option>                                
                  
					<option value="Assam" > Assam</option>                                
                  
					<option value="Bihar" > Bihar</option>                                
                  
					<option value="Chandigarh" > Chandigarh</option>                                
                  
					<option value="Chhattisgarh" > Chhattisgarh</option>                                
                  
					<option value="Dadra and Nagar Haveli" > Dadra and Nagar Haveli</option>                                
                  
					<option value="Delhi" > Delhi</option>                                
                  
					<option value="Goa" > Goa</option>                                
                  
					<option value="Gujarat" > Gujarat</option>                                
                  
					<option value="Haryana" > Haryana</option>                                
                  
					<option value="Himachal Pradesh" > Himachal Pradesh</option>                                
                  
					<option value="Jammu and Kashmir" > Jammu and Kashmir</option>                                
                  
					<option value="Jharkhand" > Jharkhand</option>                                
                  
					<option value="Karnataka" > Karnataka</option>                                
                  
					<option value="Kerala" > Kerala</option>                                
                  
					<option value="Madhya Pradesh" > Madhya Pradesh</option>                                
                  
					<option value="Maharashtra" > Maharashtra</option>                                
                  
					<option value="Manipur" > Manipur</option>                                
                  
					<option value="Meghalaya" > Meghalaya</option>                                
                  
					<option value="Mizoram" > Mizoram</option>                                
                  
					<option value="Nagaland" > Nagaland</option>                                
                  
					<option value="Odisha" > Odisha</option>                                
                  
					<option value="Orissa" > Orissa</option>                                
                  
					<option value="Others" > Others</option>                                
                  
					<option value="Pondicherry" > Pondicherry</option>                                
                  
					<option value="Punjab" > Punjab</option>                                
                  
					<option value="Rajasthan" > Rajasthan</option>                                
                  
					<option value="Sikkim" > Sikkim</option>                                
                  
					<option value="Tamil Nadu" > Tamil Nadu</option>                                
                  
					<option value="Tamilnadu" > Tamilnadu</option>                                
                  
					<option value="Tripura" > Tripura</option>                                
                  
					<option value="Uttar Pradesh" > Uttar Pradesh</option>                                
                  
					<option value="Uttaranchal" > Uttaranchal</option>                                
                  
					<option value="West Bengal" > West Bengal</option>                                
                  	</select>
<?php echo "$location_error"?></td>
                    </tr>
                    <tr>
                    <td>College Name</td>
                        <td><input type="text" name="colname" required <?php
             if(!empty( $_REQUEST['submitbtn']) && empty($_REQUEST['colname']))
                 echo "class='box'";?>/></td>
                    </tr>
                    <tr>
                    <td>Current Semester</td>
                        <td><select name="cursem" required >
<option value="">Select</option>
     
	  <option value="1"> 1 </option>
	
	  <option value="2"> 2 </option>
	
	  <option value="3"> 3 </option>
	
	  <option value="4"> 4 </option>
	
	  <option value="5"> 5 </option>
	
	  <option value="6"> 6 </option>
	
	  <option value="7"> 7 </option>
	
	  <option value="8"> 8 </option>
	
	  <option value="9"> 9 </option>
	
	  <option value="10"> 10 </option>
	
 </select><?php echo "$semester_error"?></td>
                        <td>Year of Passing</td>
                        <td><select name="yearofpassing" required ><option value="">Select</option>
  
    <option value="2013">2013</option>
  
    <option value="2014">2014</option>
  
    <option value="2015">2015</option>
  
    <option value="2016">2016</option>
  
    <option value="2017">2017</option>
  
    <option value="2018">2018</option>
  
    <option value="2019">2019</option>
  
    <option value="2020">2020</option>
  
    <option value="2021">2021</option>
  
    <option value="2022">2022</option>
  
    <option value="2023">2023</option>
  
 </select></td>
                    </tr>
                    <td>Stream Name</td>
                    <td> <select name="stramname" >
     <option value="" required >--Select Stream--</option>
	    
					<option value="1" > CIVIL ENGINEERING</option>                                
                  
					<option value="2" > COMPUTER SCIENCE AND ENGINEERING</option>                                
                  
					<option value="3" > ELECTRICAL ENGINEERING</option>                                
                  
					<option value="4" > ELECTRONICS & COMMUNICATION ENGG</option>                                
                  
					<option value="5" > INFORMATION TECHNOLOGY</option>                                
                  
					<option value="6" > MECHANICAL ENGINEERING</option>                                
                  
					<option value="7" > APPLIED ELECTRONICS AND INSTRUMENTATION ENGINEERING</option>                                
                  
					<option value="8" > TEXTILE TECHNOLOGY</option>                                
                  
					<option value="9" > LEATHER TECHNOLOGY</option>                                
                  
					<option value="10" > CERAMIC ENGINEERING AND TECHNOLOGY</option>                                
                  
					<option value="11" > BIOTECHNOLOGY</option>                                
                  
					<option value="12" > MCA</option>                                
                  
					<option value="13" > BCA</option>                                
                  
					<option value="14" > COMPUTER SCIENCE HONOURS (DEGREE COURSE)</option>                                
                  
					<option value="15" > BT</option>                                
                  
					<option value="16" > AUTOMOBILE ENGINEERING</option>                                
                  
					<option value="17" > COMM-ECE</option>                                
                  
					<option value="18" > VLSI-ECE</option>                                
                  </select>
<?php echo "$streamname_error"?></td>
                </table>
            </td>
            </tr>
            <tr>
            <td>Have you done any program with us before ?
                yes<input type="radio" name="done" value="y" checked>
                no<input type="radio" name="done" value="n"></td>
            </tr>
                <tr>
                <td>How did you come to know about us ?  <select name="refered"><option value="">--Select--</option>
		   
		     
		     
                    <option value="WBUT AD">WBUT AD</option>	                                	 
	            
                    <option value="Banner/Poster">Banner/Poster</option>	                                	 
	            
                    <option value="College Notice Board">College Notice Board</option>	                                	 
	            
                    <option value="Word of Mouth">Word of Mouth</option>	                                	 
	            
                    <option value="Training &Placement Cell">Training and Placement Cell</option>	                                	 
	            
                    <option value="TechnoCampus Newsletter">TechnoCampus Newsletter</option>	                                	 
	            
                    <option value="CoreNuts Technologies">CoreNuts Technologies</option>	                                	 
	              						
</select>
</td>
            </tr>
            <tr>
            <td><h1 style="color:black;background:yellow;" align="center" >Program offered</h1></td>
            </tr>
                <tr><td># PHP & mySQL<input type="radio" name="program" value="Php & MySQL : Rs.6500/-" checked><a href="phpdet.php">for more details click here</a></td></tr>
                <tr><td># Asp and .net<input type="radio" name="program" value="ASP.net : Rs.6500/-"><a href="aspnet.php">for more details click here</a></td></tr>
                <tr> <td># Android app development<input type="radio" name="program" value="Android : Rs.7500/-" ><a href="android.php">for more details click here</a></td></tr>
                <tr><td># Machine learning with Python<input type="radio" name="program" value="Python : Rs.9500/-"><a href="python.php">for more details click here</a></td></tr>
                <tr><td># Cloud Application Development in Microsoft<input type="radio" name="program" value="Cloud App : Rs.9500/-"><a href="cloud.php">for more details click here</a></td></tr>
                <tr><td># Big data<input type="radio" name="program" value="Bigdata : Rs.9500/-"><a href="bigdata.php">for more details click here</a></td></tr>
                <tr><td># Web Development using JEE & STRUTS 2<input type="radio" name="program" value="Web Development : Rs.6500/-"><a href="web.php">for more details click here</a></td></tr>
                <tr><td># Networking Concepts & NS2<input type="radio" name="program" value="Networking Concepts : Rs.6500/-"><a href="networkcon.php">for more details click here</a></td></tr>
            <tr>
                <td>
                    <table width="100%" border="0">
                 <h1 style="color:black;background:yellow;" align="center">Agreement</h1>
            <tr><td><input type="checkbox" name="agreement" value="1" required/>I Agree that all communication will be sent to my mobile number.</td></tr>
                        <tr><td><input type="checkbox" name="agreement" value="2" required> I Agree that all the information in this application form is true, accurate and complete to the best of my knowledge.</td></tr>
                        <tr><td><input type="checkbox" name="agreement" value="3"required>I Agree that fees, once paid shall not be refundable Online/NetBanking/Credit Card charge reversal. All refund applications must be routed through training registration office.</td></tr>
                    </table>
            
                </td>
            </tr>
            <table width="100%">
            <tr>
            <td align ="center"><input type="submit" name="submitbtn"/></td>
            </tr>
            </table>
                </td>
            </tr>
           </table>
        </form>
            </table>
        <table width="100%" >
            <form method="post">
                <h1 style="color:black;background:red;" align="center" >Admin portal</h1>
        <tr>
            <td><b>admin id </b></td><td><input type = text name="admin_id"></td>
            <td><b>admin password </b><input type="password" name="admin_pass"></td>
            <td><input type="submit" name="admsubmit" value="Login"></td>
            </tr>
            </form>
        </table>
        </div>
    </body>
</html>