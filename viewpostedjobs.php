<?php
session_start();
//include "Register_user.php";

//include "Register_user.php";
include_once 'db_connect.php';
$email = $_SESSION['varname'];
$query1 = $MySQLi_CON->query("select j.postingid,p.rid,j.jobtitle,j.postingdate,j.orgname,j.yearsofexp,j.startdate,j.enddate,j.contactphone,j.mailid from jobs j join pstings p on j.postingid=p.postingid where p.rid='".$email."'");
$row1=$query1->fetch_array();
	echo "<div id=\"main\"align=\"center\"> ";
	echo "<h1>RECRUITER POSTINGS</h1>";
	echo "<table class=\"table table-striped\" summary=\"Table\" border=\"1\" cellspacing=\"2\" cellpadding=\"1\">
		<thead><tr align=\"left\" valign=\"top\" style=\"color:#00A9DF;font-style:italic\"><th>Posting ID</th>
<th>Recruiter ID</th><th>Jobtitle</th><th>Posting Date</th><th>Organisation Name</th><th>Required Years Of Exp</th><th>Start Date</th><th>End Date</th><th>Contact Phone</th><th>Mail ID</th>
</tr></thead><tbody>";
if (sizeof($row1)> 0) {
		
		// output data of each row
		// output data of each row
		while ( $row = mysqli_fetch_assoc ( $query1 ) ) {
			echo "<tr align=\"left\" valign=\"top\" style=\"color:#00A9DF\"><td>" . $row ["postingid"] . "</td><td>" . $row ["rid"] . "</td><td>" . $row ["jobtitle"] . "</td><td>" . $row ["postingdate"] . "</td><td>" .$row["orgname"]  . "</td><td>" . $row ["yearsofexp"] . "</td><td>"  . $row ["startdate"] . "</td><td>". $row ["enddate"] . "</td><td>". $row ["contactphone"] . "</td><td>". $row ["mailid"] ."</td></tr>";
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