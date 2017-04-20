<?php
session_start();
include_once 'db_connect.php';

/*if(isset($_SESSION['userSession'])!="")
{
 //header("Location: home.php");
 exit;
}*/

if(isset($_POST['submit']))
{
 $email = $MySQLi_CON->real_escape_string(trim($_POST['username']));
 $upass = $MySQLi_CON->real_escape_string(trim($_POST['password']));
 //$userty = $MySQLi_CON->real_escape_string(trim($_POST['usertype']));
 
 $query = $MySQLi_CON->query("SELECT * FROM users WHERE loginid='".$email."'");
 $row=$query->fetch_array();
 //$url_params=$param($email);
 $_SESSION['varname'] = $email;
 //$_SESSION['email'] = $email;
 if($upass == $row['pwd'] )
 {
  $_SESSION['userSession'] = $row['loginid'];
  $role=$row['user_type'];
  switch($role){
  	case "1":
  	/*header("Location: recruiter.php");*/
    header("Location:recruiter.php");
  	break;
  	default:
  	header("Location: student.php");
  	break;
  }
  
 }
 else
 {

  header("Location: error.php");
  echo"hello student";
 	 echo "$userty";
 }
 
 
 $MySQLi_CON->close();
 
}
if(isset($_POST['signup'])){
header("Location: Register_user.php");
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
<div id="main">
<h1 align="center">Career Service</h1>
<div id="login"align="center" style="width: 100%;">
<h2>Login Form</h2>
<form action="" method="post" >
<br>
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<br>
<br>
<label>Password :</label>
<input id="password" name="password" placeholder="password" type="password">
<br>
<br>
<!-- <label>User Type :</label>
<input type="radio" name="usertype" value="Admin" > Admin
<input type="radio" name="usertype" value="User" > User
<br> -->
<input name="submit" type="submit" value=" Login ">
<input name="signup" type="submit" value=" signup ">
<!-- <span><?php echo $error; ?></span> -->
</form>
</div>
</div>
</body>
</html>