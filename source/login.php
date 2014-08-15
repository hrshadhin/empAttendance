<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Login</title>
 <link rel="STYLESHEET" type="text/css" href="style/regi.css" />
<link rel="STYLESHEET" type="text/css" href="style/design.css" />
      <script type="text/javascript" src="script/regierror.js"></script>
    <style type="text/css">
		h6{font-weight: bold;color:#FF0000;text-align:left;}
</style>
</head>
<body>
<body bgcolor="orange" >
<center>
<H1>Fill Your Information</h1>
<form id="regi" action='check_login.php' method='post' accept-charset='UTF-8'>
<fieldset id="fieldset"><legend>Member Login</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='username' >UserName*:</label><br>
<input type='text' name='username'  maxlength="12" /><br>
<label for='password' >Password*:</label><br>
<input type='password' name='password'  maxlength="20" /><br><br>
<button type='submit' name='Submit' value='Submit' id="button_log">login</button>

</fieldset>
</form>
<div align="center">
<input  type='button'  value="Home" onclick="window.location='http://localhost/index.html'" >
<input  type='button'  value="Don't have account" onclick="window.location='http://localhost/source/register.php'" ></div>
</body>
</html>  
