<?php
if(isset($_POST['submitted'])){
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="123"; // Mysql password
$db_name="empinfo"; // Database name
$tbl_name="info"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or
die("cannot connect");
mysql_select_db("$db_name")or die("cannot select Database");

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and
password='$mypassword'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){
//session_register("myusername");
//session_register("mypassword");
session_start();
$_SESSION['s'] = 1;
$_SESSION['uname'] = $myusername;
header("location:login_success.php");
}
else {
    echo ('<center><h1>Wrong username or password.</h1><br><br><br><br><a href="login.php" target="_self"><strong>Try Again</strong></a>');
}
}
else{
	header("location:login.php");
}
?>
