<?php
session_start();
include_once 'db_connect.php';

/*if(isset($_SESSION['userSession'])!="")
{
 //header("Location: home.php");
 exit;
}*/

/*function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}*/

if(isset($_POST['submit']))
{
 $password = $MySQLi_CON->real_escape_string(trim($_POST['password']));

 $username = $MySQLi_CON->real_escape_string(trim($_POST['username']));
 $fname = $MySQLi_CON->real_escape_string(trim($_POST['fname']));
 $lname = $MySQLi_CON->real_escape_string(trim($_POST['lname']));
 $phone = $MySQLi_CON->real_escape_string(trim($_POST['phone']));
 $mailid = $MySQLi_CON->real_escape_string(trim($_POST['mailid']));
 $usertype = $MySQLi_CON->real_escape_string(trim($_POST['radio']));
 $qualificationname = $MySQLi_CON->real_escape_string(trim($_POST['qualificationname']));
 $technologyname = $MySQLi_CON->real_escape_string(trim($_POST['technologyname']));
 

 $query = $MySQLi_CON->query("INSERT INTO users values('".$fname."','".$lname."','".$phone."','".$mailid."','".$usertype."','".$username."','".$password."')");
 //echo gettype(getval$usertype);
 
 /*INSERT INTO `career`.`recruiter` (`loginid`, `fname`, `lname`, `mail_id`, `phone`, `pwd`, `usertype_id`) VALUES ('nando', 'nando', 'nando', 'inalanandita@gmail.com', '98755', 'nando', '1');*/
 echo gettype((int)$usertype);

 echo gettype('1');
 //echo strcmp(trim(".$usertype."),trim("admin"));
 if((int)$usertype==1){
 	 	echo "the value selected is ".$usertype."";
 	 	$query1= $MySQLi_CON->query("INSERT INTO `career`.`recruiter` (`loginid`, `fname`, `lname`, `mail_id`, `phone`, `pwd`, `usertype_id`,`rid`) values('".$username."','".$fname."','".$lname."','".$mailid."','".$phone."','".$password."','".$usertype."','".$username."')");
 	 	header("Location: index.php");
 	 	//echo " Thanks for registering login here";
 	 	
  	

 	

 }
 else{
 	$query1= $MySQLi_CON->query("INSERT INTO student values('".$username."','".$username."','".$fname."','".$lname."','".$mailid."','".$phone."','".$password."','".$usertype."')");
 	header("Location: index.php");
 	//phpAlert(   "Hello world!\\n\\nPHP has got an Alert Box"   );
//echo "the value selected student ".$usertype."";
 }

 

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


<label>First Name :</label>
<input id="fname" name="fname" placeholder="first name" type="text" required>
<br>
<br>
<label>Last Name :</label>
<input id="lname" name="lname" placeholder="last name" type="text" required>
<br>
<br>
<label>Phone:</label>
<input id="phone" name="phone" placeholder="phone number" type="number"  required>
<br>
<br>
<label>Mail Id :</label>
<input id="mailid" name="mailid" placeholder="mail id" type="text" required>
<br>
<br>
<label>User type :</label>
<input type="radio" name="radio" value=1 id="admin"> Admin
<input type="radio" name="radio" value=2 id="student"> Student
<br>
<br>
<label>Login Name:</label>
<input id="name" name="username" placeholder="username" type="text" required>
<br>
<br>
<label>Qualification name :</label>
<input id="qualificationname" name="qualificationname" placeholder="qualification name" type="text" required>
<br>
<br>
<label>Technology name :</label>
<input id="technologyname" name="technologyname" placeholder="Technology name" type="text" required>
<br>
<br>
<label>Password :</label>
<input id="password" name="password" placeholder="password" type="password" required>
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