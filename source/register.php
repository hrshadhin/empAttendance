<?php

	$errors = array();
		
	if(isset($_POST['submitted'])){
			$host="localhost"; // Host name
			$username="root"; // Mysql username
			$dbpassword="123"; // Mysql password
			$db_name="empinfo"; // Database name
			$tbl_name="info"; // Table name
			
			$uname = $_POST["username"];
			$name =$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$gender = $_POST['gender'];
			$joinDate= $_POST['datum1'];
			
			$designation = $_POST['desig'];
			
			if(eregi('^[A-Za-z0-9 ]{3,12}$',$uname)) {
				
				$valid_uname=$uname;			 
			}
			else {
					
				$errors[]='Invalid username. username should be 3 to 12 characters long';		
			}
			if(eregi('^[A-Za-z0-9 ]{3,20}$',$name)) {
				
				$valid_name=$name;			 
			}
			else {
					
				$errors[]='Invalid name.name should be 3 to 50 characters long';		
			}
			if(strlen($password)>5) {
				
				$valid_password=$password;			 
			}
			else {
					
				$errors[]='Invalid password. its shouldbe 6 to 20 chars long & mixed with letter number & symbol .';		
			}
			
			
			if (eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$', $email))
			{
					$valid_email=$email;
			}
			else
			{
					$errors[]='Enter valid Email.';
			}
			if ($gender=='')
			{
					$errors[]='Select Gender';
			}
			else
			{
					$valid_gender=$gender;
			}
			if ($joinDate == '')
			{
					$errors[]='Provide joining date.';
			}
			else {
							
				$joindate=$joinDate;
			}
					
		   if ($designation=='')
			{
					$errors[]='Enter your Designation.';
			}
			else
			{
					$valid_desig=$designation;
			}
		
		
		if(!empty($errors)) {
			
			foreach($errors as $error){
				
			   echo '<font color="red">';
				echo '<strong>', $error,'</strong><br>';
				echo '</font>';
			}
		}
		else {
           
              	// Connect to server and select database.
mysql_connect("$host", "$username", "$dbpassword")or
die("cannot connect");
mysql_select_db("$db_name")or die("cannot select Database");
					
						
						mysql_query("INSERT INTO info(username,name,email,password,joinDate,gender,post)
   					VALUES('$valid_uname','$valid_name','$valid_email','$valid_password','$joindate','$valid_gender','$valid_desig')  ");  
   	            $str = mysql_error();
   	            $substr1="username";
   	            $substr2 = "email";
   	         	if(!mysql_error()){
   	         	
   	         			header( 'Location:thankyou.html' ) ;
   	         		}
   	         		elseif(strpos($str,$substr1)== true) {
								 echo 'Username already exits.try anotherone.';	         			
   	         			
   	         			}
   	         		elseif(strpos($str,$substr2)==true) {
   	         			
   	         			 echo 'Email already exits.try anotherone.';	     
   	         			
   	         			}
   	         		
   	         			
   	    
   	         			
   	         			
   	         
           
  
				}
		
		}
		
	
	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Account Registration</title>
    <link rel="STYLESHEET" type="text/css" href="style/design.css" />
     <script language="javaScript" type="text/javascript" src="script/calendar.js"></script>
    <link href="style/calendar.css" rel="stylesheet" type="text/css">
</head>
<body>
<body bgcolor="orange" >
<p align="right">
<input  type='button'  value="Home" onclick="window.location='http://10.5.25.17/emp/index.html'" ></p>
<center>
<h2>Fill Your Information</h2>
<form action="register.php" method="post" accept-charset="UTF-8">
<fieldset><legend>Registration</legend>
<h6 id="req">* Required feilds</h6> 
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for="username">UserName*:</label><br>
<input name="username" maxlength="12" type="text"><br>
<label for="name">Your Full Name*: </label><br>
<input name="name" id="name" maxlength="50" type="text"><br>
<label for="email">Email Address*:</label><br>
<input name="email" id="email" maxlength="80" type="text"><br>
<label for="password">Password*:</label><br>
<input name="password" id="password" maxlength="20" type="password"><br>
<label for="username">Gender*:</label>
<div>
<select title="Gender" class="" id="gender" name="gender" aria-required="true">
                    <option value="" selected="selected">- Select One -</option>
                    <option title="Male" value="male">Male</option>
                    <option title="Female" value="female">Female</option>
               </select></div>
<label for="username">Joining Date*:</label><br>
 <div>      
  <input type="text" name="datum1"><a href="#" onClick="setYears(1971, 2050);
       showCalender(this, 'datum1');">
      <img src="style/calender.png"></a></div>
 <!-- Calender Script  --> 

    <table id="calenderTable">
        <tbody id="calenderTableHead">
          <tr>
            <td colspan="4" align="center">
	          <select onChange="showCalenderBody(createCalender(document.getElementById('selectYear').value,
	           this.selectedIndex, false));" id="selectMonth">
	              <option value="0">Jan</option>
	              <option value="1">Feb</option>
	              <option value="2">Mar</option>
	              <option value="3">Apr</option>
	              <option value="4">May</option>
	              <option value="5">Jun</option>
	              <option value="6">Jul</option>
	              <option value="7">Aug</option>
	              <option value="8">Sep</option>
	              <option value="9">Oct</option>
	              <option value="10">Nov</option>
	              <option value="11">Dec</option>
	          </select>
            </td>
            <td colspan="2" align="center">
			    <select onChange="showCalenderBody(createCalender(this.value, 
				document.getElementById('selectMonth').selectedIndex, false));" id="selectYear">
				</select>
			</td>
            <td align="center">
			    <a href="#" onClick="closeCalender();"><font color="#003333" size="+1">X</font></a>
			</td>
		  </tr>
       </tbody>
       <tbody id="calenderTableDays">
         <tr style="">
           <td>Sun</td><td>Mon</td><td>Tue</td><td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td>
         </tr>
       </tbody>
       <tbody id="calender"></tbody>
    </table>

<!-- End Calender Script  --> 



<label for="username">Designation*:</label><br>
<input name="desig" id="desig" maxlength="50" type="text"><br>


<input name="Submit" value="Submit" type="submit">
</fieldset>
</form>

  
</center></body></html>
