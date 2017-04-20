<?php
session_start();
//include "Register_user.php";
include_once 'db_connect.php';
if(isset($_POST['submit']))
{
	$email = $_SESSION['varname'];
	$jobtitle = $MySQLi_CON->real_escape_string(trim($_POST['jobtitle']));
	$orgname = $MySQLi_CON->real_escape_string(trim($_POST['orgname']));
	$postingdate = $MySQLi_CON->real_escape_string(trim($_POST['postingdate']));
	$yearsofexp = $MySQLi_CON->real_escape_string(trim($_POST['yearsofexp']));
	$startdate = $MySQLi_CON->real_escape_string(trim($_POST['startdate']));
	$enddate = $MySQLi_CON->real_escape_string(trim($_POST['enddate']));
	$phone = $MySQLi_CON->real_escape_string(trim($_POST['phone']));
	$mailid = $MySQLi_CON->real_escape_string(trim($_POST['mailid']));
	$technologyreq = $MySQLi_CON->real_escape_string(trim($_POST['technologyreq']));
	$certificationreq = $MySQLi_CON->real_escape_string(trim($_POST['certificationreq']));
	$qualificationreq = $MySQLi_CON->real_escape_string(trim($_POST['qualificationreq']));
	//$object = $session['object'];
	$query = $MySQLi_CON->query("INSERT INTO jobs values('".$jobtitle."','".$jobtitle."','".$postingdate."','".$orgname."','".$yearsofexp."','".$startdate."','".$enddate."','".$mailid."','".$phone."')");
	$query1= $MySQLi_CON->query("SELECT MAX( postingid ) as id FROM jobs");
	$row=$query1->fetch_array();
	
	$r=$row['id'];
	//$q=(int)$query1;
	echo gettype($email);
	echo gettype($row['id']);
	$query2 = $MySQLi_CON->query("INSERT INTO `career`.`pstings` (`rid`, `postingid`) VALUES ('".$email."','".$r."')");
	$query3 = $MySQLi_CON->query("INSERT INTO `career`.`jobrequirements` VALUES ('".$r."','".$technologyreq."','".$certificationreq."','".$qualificationreq."')");
	echo "inserted";
	header("Location:recruiter.php");
	//INSERT INTO `career`.`pstings` (`rid`, `postingid`) VALUES ('nandy', '1');
	//echo gettype((int)$query1);
	//echo $_GET['email'];
	/*INSERT INTO `career`.`jobs` (`postingid`, `jobtitle`, `postingdate`, `orgname`, `yearsofexp`, `startdate`, `enddate`, `mailid`, `contactphone`) VALUES (NULL, 'se', '2016-04-15', 'nttdata', '1', '2016-04-16', '2016-04-30', 'inalanandita@gmail.com', '987643');*/
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<link href="css/bs-simpla/assets/css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/bs-simpla/assets/css/bootstrap.css" rel="stylesheet" type="text/css"> 
<link href="css/bs-simpla/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main"align="center" >
<h1>Career Service</h1>
<div id="login" align="center" style="width: 100%;">
<h2>Registration Form</h2>

<form action="" method="post" >
<br>


<label>Job title:</label>
<input id="jobtitle" name="jobtitle" placeholder="job title" type="text" required>
<br>
<br>
<label>Organisation Name:</label>
<input id="orgname" name="orgname" placeholder="org name" type="text" required>
<br>
<br>
<label>Posting Date:</label>
<input id="postingdate" name="postingdate" placeholder="posting date" type="date"  required>
<br>
<br>
<label>Years of experience required:</label>
<input id="yearsofexp" name="yearsofexp" placeholder="years of exp" type="text" required>
<br>
<br>
<label>Start Date:</label>
<input id="startdate" name="startdate" placeholder="startdate" type="date"  required>
<br>
<br>
<label>End Date:</label>
<input id="enddate" name="enddate" placeholder="enddate" type="date"  required>

<br>
<br>
<label>Phone:</label>
<input id="phone" name="phone" placeholder="phone" type="number" required>
<br>
<br>
<label>Contact MailID :</label>
<input id="mailid" name="mailid" placeholder="mailid" type="text" required>
<br>
<br>
<label>Technology Required :</label>
<input id="technologyreq" name="technologyreq" placeholder="technology req" type="text" required>
<br>
<br>
<label>Technology Required :</label>
<input id="technologyreq" name="technologyreq" placeholder="technology req" type="text" required>
<br>
<br>
<label>Certification Required :</label>
<input id="certificationreq" name="certificationreq" placeholder="certification req" type="text" required>
<br>
<br>
<label>Quaification Required :</label>
<input id="qualificationreq" name="qualificationreq" placeholder="qualification req" type="text" required>
<br>
<br>
<input name="submit" type="submit" value=" submit ">
<!-- <span><?php echo $error; ?></span> -->
</form>
</div>
</div>
</div>
</body>
</html>