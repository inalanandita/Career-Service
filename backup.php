
include ("database/db_connection.php");
// session_start (); // session starts here
if (isset ( $_SESSION ['user_name'] )) {
   header ( "Location: index.php" );
}
$err = array ();
foreach ( $_GET as $key => $value ) {
   $get [$key] = filter ( $value ); // get variables are filtered.
}
if (isset ( $_POST ['login'] )) {
   if ($_POST ['login'] == 'login') {
      
      foreach ( $_POST as $key => $value ) {
         $data [$key] = filter ( $value ); // post variables are filtered
      }
      $user_username = $data ['username'];
      $user_pass = $data ['pass'];
      
      $check_user_sql = "select userid,username,password,email,fname,mname,lname from users WHERE Username='$user_username'AND Password='$user_pass'";
      
      $result = mysqli_query ( $dbcon, $check_user_sql );
      
      // Match row found with more than 1 results - the user is authenticated.
      if (mysqli_num_rows ( $result ) > 0) {
         
         list ( $userid, $username, $password, $email, $fname, $mname, $lname ) = mysqli_fetch_row ( $result );
         // echo $username;
         // check against salt
         if ($_POST ['type'] == 'student') {
            $check_user_sql = "select userid,sid from student WHERE UserID='$userid'";
            
            $result2 = mysqli_query ( $dbcon, $check_user_sql );
            if (mysqli_num_rows ( $result2 ) == 1) {
               list ( $userid2, $sid ) = mysqli_fetch_row ( $result2 );
               $pwd = PwdHash ( $password, substr ( $password, 0, 9 ) );
               if ($pwd === PwdHash ( $user_pass, substr ( $password, 0, 9 ) )) {
                  session_start ();
                  
                  session_regenerate_id ( true ); // prevent against session fixation attacks.
                                                  
                  // this sets variables in the session
                  $_SESSION ['user_name'] = $username;
                  $_SESSION ['user_email'] = $email;
                  $_SESSION ['user_fname'] = $fname;
                  $_SESSION ['user_mname'] = $mname;
                  $_SESSION ['user_lname'] = $lname;
                  $_SESSION ['sid'] = $sid;
                  // $_SESSION['user_level'] = $user_level;
                  $_SESSION ['HTTP_USER_AGENT'] = md5 ( $_SERVER ['HTTP_USER_AGENT'] );
                  // $_SESSION['user'] = $user;
                  header ( "Location: index.php" );
               } else {
                  // $msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
                  $err [] = "Invalid Login. Please try again with correct user email and password.";
                   header("Location: login.php");
               }
            }
         }
         if ($_POST ['type'] == 'recruiter') {
            $check_user_sql = "select userid,recid from recruiter WHERE UserID='$userid'";
            
            $result2 = mysqli_query ( $dbcon, $check_user_sql );
            if (mysqli_num_rows ( $result2 ) == 1) {
               list ( $userid2, $recid ) = mysqli_fetch_row ( $result2 );
               $pwd = PwdHash ( $password, substr ( $password, 0, 9 ) );
               if ($pwd === PwdHash ( $user_pass, substr ( $password, 0, 9 ) )) {
                  session_start ();
                  
                  session_regenerate_id ( true ); // prevent against session fixation attacks.
                                                  
                  // this sets variables in the session
                  $_SESSION ['user_name'] = $username;
                  $_SESSION ['user_email'] = $email;
                  $_SESSION ['user_fname'] = $fname;
                  $_SESSION ['user_mname'] = $mname;
                  $_SESSION ['user_lname'] = $lname;
                  $_SESSION ['recid'] = $recid;
                  // $_SESSION['user_level'] = $user_level;
                  $_SESSION ['HTTP_USER_AGENT'] = md5 ( $_SERVER ['HTTP_USER_AGENT'] );
                  // $_SESSION['user'] = $user;
                  header ( "Location: RecruiterAppReview.php" );
               } else {
                  // $msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
                  $err [] = "Invalid Login. Please try again with correct user email and password.";
                   header("Location: login.php");
               }
            }
         }
      } else {
         $err [] = "Error - Invalid login. No such user exists";
          echo "<script>alert('username or password is incorrect!')</script>";
       header("Location: login.php",'_self');
      }
   }
}
?>


<html>
<head lang="en">
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet"
   href="bootstrap-3.2.0-dist\css\bootstrap.css">
<title>Login</title>
<link rel="favicon" href="assets/images/favicon.png">
<link rel="stylesheet" media="screen"
   href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/bootstrap-theme.css"
   media="screen">
<link rel="stylesheet" href="assets/css/style.css">
<link rel='stylesheet' id='camera-css' href='assets/css/camera.css'
   type='text/css' media='all'>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
   <script src="assets/js/html5shiv.js"></script>
   <script src="assets/js/respond.min.js"></script>
   <![endif]-->
</head>
<style>
.login-panel {
   margin-top: 150px;
}
</style>