<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
</head>
<?php
//display navigation bar
include_once("navigation.php");
?>
<body>
<center><h1>Login</h1>
<form name="form1" method="post" action="auth.php">
<table>
<tr>
	<td>Username</td>
	<td>:</td>
	<td><input name="myusername" type="text" id="myusername"></td>
</tr>
<tr>
	<td>Password</td>
	<td>:</td>
	<td><input name="mypassword" type="password" id="mypassword"></td>
</tr><tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</table>
</form>
</body>