<?php 
   
   	$uname=$_POST['username'];
   	$pass=$_POST ['password'];
   	$info=null;
   	
   	$conn = mysql_connect('localhost','root','123')or die("Unable to connect to MySQL<br><a href='register.php' target='_self'><h1>Try Again</h1></a>");
 		
		$selected = mysql_select_db("empinfo",$conn)or die("Could not select empinfo.<br><a href='register.php' target='_self'><h1>Try Again</h1></a>");
   		//echo "succefull to connent<br>";
   		
   	$sql = "SELECT uname FROM info";
$result = mysql_query($sql ,$conn);

    $tester=null;

      while($myrow = mysql_fetch_array($result)) {
      	
			if($myrow[uname]==$_POST['username']){
				
				$tester="login";
				$sql2 = "SELECT password FROM info";
				$result2 = mysql_query($sql2 ,$conn);
				while($myrow2 = mysql_fetch_array($result2)){
					
					if($myrow2[password]==$_POST ['password']) {
						
						echo "your succenfuly login ".$uname."<br>";
						$tester="slog";
						echo "<a href='login.php'>Logout</a>";
						break;	
					
					}
					
				}
				if($tester!=='slog') {
		   		echo "Password don't match<br>";
		   		echo "<a href='login.php'>Tyr again</a>";
		   	}
		   
				
      	 }
      }
      if($tester==null) {
		   	echo "Username not registered.<br>";
		   	echo "<a href='login.php'>Tyr again</a>";
		   	}
  
   mysql_close($conn);	
	

		
		
	
?>

<html>
</head><title>Login conform</title></head>
<body>






 
</body>
</html> 
