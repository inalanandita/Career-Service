<?php
session_start();
//include "Register_user.php";
include_once 'db_connect.php';

//$SearchDept;
static $SearchDept ;

if (isset ( $_GET ['Apply'] )) {
	
	
	$data = $_GET['postingid'] ; // post variables are filtered
	
	
	
$SearchDept = $data;
}

//$SearchDept = $_POST['".$postingid."'];
/*$SearchDept = $data ['postingid'];*/
if(isset($_POST['submit'] ))
{
	//plication();
	$email = $_SESSION['varname'];
	$techtype = $MySQLi_CON->real_escape_string(trim($_POST['radio1']));
	$certitype = $MySQLi_CON->real_escape_string(trim($_POST['radio2']));
	$qualitype = $MySQLi_CON->real_escape_string(trim($_POST['radio3']));
	
	//$object = $session['object'];
	$query = $MySQLi_CON->query("INSERT INTO applications values('".$SearchDept."','".$email."','completed','".$techtype."','".$certitype."','".$qualitype."')");

}	
?>
<!DOCTYPE html>
<html>
<head>
<title>Apply</title>
<link href="css/bs-simpla/assets/css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/bs-simpla/assets/css/bootstrap.css" rel="stylesheet" type="text/css"> 
<link href="css/bs-simpla/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<div id="main"align="center" >
<h1>Career Service</h1>
<div id="login" align="center" style="width: 80%;">
<h2 style="color:#00A9DF">Enter Your Preferences</h2>

<form action="" method="post" >
<br>

<label>Technology Prefered:</label>
<input type="radio" name="radio1" value="java" id="java"> Java
<input type="radio" name="radio1" value=".net" id=".net"> .Net
<input type="radio" name="radio1" value="sharepoint" id="sharepoint"> Sharepoint
<br>
<br>
<label>Certification Prefered:</label>
<input type="radio" name="radio2" value="ocjp" id="ocjp"> OCJP
<input type="radio" name="radio2" value="mcpd" id="mcpd"> MCPD
<input type="radio" name="radio2" value="bigdata" id="bigdata"> Bigdata
<input type="radio" name="radio2" value="db2" id="db2"> DB2
<br>
<br>
<label>Qualification Prefered:</label>
<input type="radio" name="radio3" value="graduate" id="graduate"> Graduate
<input type="radio" name="radio3" value="undergraduate" id="undergraduate"> Under Graduate 
<br>
<br>
<input name="submit" type="submit" value=" submit">
</form>
</div>
</div>
</body>
</html>