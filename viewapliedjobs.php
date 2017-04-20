<?php
session_start();
//include "Register_user.php";

//include "Register_user.php";
include_once 'db_connect.php';
$email = $_SESSION['varname'];
$query1 = $MySQLi_CON->query("select j.postingid,a.sid,j.jobtitle,j.orgname,j.mailid,a.technologyname,a.certificationname,a.qualificationname from jobs j join applications a on j.postingid=a.postingid where a.sid='".$email."'");
$row1=$query1->fetch_array();
	echo "<div id=\"main\"align=\"center\"> ";
	echo "<h1>RECRUITER POSTINGS</h1>";
	echo "<table class=\"table table-striped\" summary=\"Table\" border=\"1\" cellspacing=\"2\" cellpadding=\"1\">
		<thead><tr align=\"left\" valign=\"top\" style=\"color:#00A9DF;font-style:italic\"><th>Posting ID</th>
<th>Student ID</th><th>Jobtitle</th><th>Organisation Name</th><th>Mail ID</th><th>Technology Name</th><th>Certification Name</th><th>Qualification Name</th>
</tr></thead><tbody>";
if (sizeof($row1)> 0) {
		
		
		while ( $row = mysqli_fetch_assoc ( $query1 ) ) {
			echo "<tr align=\"left\" valign=\"top\" style=\"color:#00A9DF\"><td>" . $row ["postingid"] . "</td><td>" . $row ["sid"] . "</td><td>" . $row ["jobtitle"] . "</td><td>" . $row ["orgname"] . "</td><td>" .$row["mailid"]  . "</td><td>" . $row ["technologyname"] . "</td><td>"  . $row ["certificationname"] . "</td><td>". $row ["qualificationname"] ."</td></tr>";
		}
	} else {
		echo "<p class= \" error\"> Sorry, No Jobs offered currently.</p>";
	}
	echo "</tbody></table>";
	echo "</div>";
?>
<!DOCTYPE html>
<html>
<head>
<title>RECRUITER</title>
<link href="css/bs-simpla/assets/css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/bs-simpla/assets/css/bootstrap.css" rel="stylesheet" type="text/css"> 
<link href="css/bs-simpla/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main"align="center" >
<!-- <h1> RECRUITER POSTING</h1>
<button type="button" value="" onclick="posting">Postings!</button>
<input name="submit" type="submit" value=" Login ">
<input name="signup" type="submit" value=" signup ">
<a>.$query1.</a> -->

</div>
</body>
</html>