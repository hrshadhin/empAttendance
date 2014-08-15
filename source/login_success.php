<?php
	session_start();
	if(!$_SESSION['s'] == 1){
		header("location:login.php");
	}
	$name = $_SESSION['uname'];
	$host="localhost"; // Host name
	$username="root"; // Mysql username
   	$dbpassword="123"; // Mysql password
	$db_name="empinfo"; // Database name
	$tbl_name="history"; // Table name
	$m='mon';
	$d='mday';
	$y='year';
	$h='hours';
	$min='minutes';
	$sec ='seconds';
	
	if(isset($_POST['presented'])) {
			
			
              	// Connect to server and select database.
					mysql_connect("$host", "$username", "$dbpassword")or die("cannot connect");
					mysql_select_db("$db_name")or die("cannot select Database");
					
			      $my_t=getdate(date("U"));	
			      $Date=$my_t[$d]."/".$my_t[$m]."/".$my_t[$y];
			      $time=$my_t[$h].":".$my_t[$min].":".$my_t[$sec];
			      $sql="SELECT username,date FROM $tbl_name WHERE username='$name' and 
			      date='$Date'";
			
			
			$result=mysql_query($sql);
			$count=mysql_num_rows($result);

			if(!$count==1){
				
				mysql_query("INSERT INTO history(date,username,apear_time,leave_time)
   				VALUES('$Date','$name','$time','')  ") or die(mysql_error());
				echo "<script>alert('Thank you,your present has been counted.')</script>";
				mysql_close();

			}
			else{
				

               
					
					
					echo "<script>alert('You have a already set apear time for today.')</script>";
					mysql_close();

                        } 
               
				
				     
	
	
	
		}
		if(isset($_POST['leave'])) {
	
				mysql_connect("$host", "$username", "$dbpassword")or die("cannot connect");
			        mysql_select_db("$db_name")or die("cannot select Database");
			      $my_t=getdate(date("U"));	
			      $Date=$my_t[$d]."/".$my_t[$m]."/".$my_t[$y];
			     
			      $sql="SELECT apear_time FROM $tbl_name WHERE username='$name' and 
			      date='$Date'";
			
			
			$result=mysql_query($sql) or die(mysql_error());
			$count=mysql_num_rows($result) or die(mysql_error());
                        echo ($count);
	       if($count==1){

				echo "<script>alert('Thank you,your leave has been counted.');</script>";
				mysql_close();


			}
			else{

				echo "<script>alert('You didn't set apear time yet.First set it.');</script>";
				mysql_close();

			}
			
	
	
		}
		if(isset($_POST['history'])) {

	
				echo "<script>alert('History check.')</script>";
	
	
	
		}
	
?>
<html>
<head>
<title>Working page</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
 <link rel="STYLESHEET" type="text/css" href="style/design.css" />
</head>
<body>
<body  bgcolor="#9F81F7"  >
                  <center><h1><?php echo $name ?> you've successfully login.</h1>
                  <p align="right"><a href="logout.php" target="_self" id="button_log"><strong>LogOut</strong></a></p>
                  
                 
                   
               
                 
                  <table>
<tr>
<td> <form action="login_success.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="presented" id="presented"  value=1 />
                  <input type="submit" name="submit" value="Show Up" size="52" id="button" />
              
                  </form>
                  </td>
<td><form action="login_success.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="leave" id="leave" value=1 />
                  <input type="submit" name="submit" value="Leave" size="52" id="button" />
              
                  </form>
                  </td>
<td><form action="login_success.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="history" id="history" value=1 />
                  <input type="submit" name="submit" value="History" size="52" id="button" />
              
                  </form>
                  </td>
</tr>
</table>







</body>
</html>
