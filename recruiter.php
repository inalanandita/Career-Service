<?php
session_start();
//include "Register_user.php";
include_once 'db_connect.php';
$email = $_SESSION['varname'];
$query = $MySQLi_CON->query("select * from pstings p join jobs j on j.postingid=p.postingid where p.rid=".$email."");
$_SESSION['que'] = $query;
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
<h1> RECRUITER PORTAL</h1>
<!-- <button type="button" value="" onclick="posting">Postings!</button>
<input name="submit" type="submit" value=" Login ">
<input name="signup" type="submit" value=" signup "> -->
<br>
<br>
<br>
<br>
<h2 ><a href="postjobs.php" > POST JOBS</a> </h2>
<br>
<br>
<h2 ><a href="viewpostedjobs.php"> VIEW POSTED JOBS</a> </h2>
<br>
<br>
<br>
<br>
<!-- <a href="index.php"> DISPLAY JOBS POSTED</a>  -->

</div>
</body>
</html>