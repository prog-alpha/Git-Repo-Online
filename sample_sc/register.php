<html>
<head>
<title>IT Store</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
</head>
<?php
//display navigation bar
include_once("navigation.php");
?>
<body>
<center>
<h1>Register</h1>
<form align="center" class="pure-form pure-form-aligned" action="register.php" method="post">
First Name	:<br> </label><input type="text" name="fname" /><br>
Last Name	:<br> <input type="text" name="lname" /><br>
Username	:<br> <input type="text" name="username" /><br>
Gender	:<br></label><select name="gender">
		<option value=""> </option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
</select><br />
Email	:<br> <input type="text" name="email" /><br>
Contact	:<br> <input type="text" name="contact"/><br>
Password	:<br> <input type="password" name="pwd"/><br>
Confirm Password	:<br> <input type="password" name="cpwd"/><br><br>
<input type="submit" name="registerbutton" value="Register Now" />
</form><br>
</body>
<?php
function check_name($text)
{
   if(isset($text))
   {
       if (!empty($text) && preg_match("/^([A-Za-z ])+$/", $text)) //a-z and spaces only
       {
       	return TRUE;
       }
   	return FALSE;
   }
}
function check_contact($text)
{
	if(isset($text))
	{
		if (!empty($text) && preg_match("/^\d{8}$/", $text)) //a-z and spaces only
		{
			return TRUE;
		}
		return FALSE;
	}
}
if(isset($_POST['registerbutton']))
{
	//echo $_POST["fname"];
	//echo $_POST["lname"];
	//echo $_POST["gender"]; 
	//echo $_POST["email"];
	//echo $_POST["contact"];
	/*
	if(!check_name($_POST["fname"]))
	{
		echo "Registration fail. Please input a valid name. A valid name only contain alphabetic letter and spaces.";
		exit();
	}
	if(!check_contact($_POST["contact"]))
	{
		echo "Registration fail. Please input a valid contact. A valid contact only contain 8 numeric digits.";
		exit();
	}*/
	if($_POST["pwd"] != $_POST["cpwd"])
	{
		echo "<font size='3' color='red'>Registration fail. Please ensure your password and confirm password matches.";
		exit();
	}
	$connect=mysqli_connect('localhost', 'root', '','demo');
	//$query = $connect->prepare("SELECT * FROM products ORDER BY id ASC");
	//$query->execute();
	$query= $connect->prepare("INSERT INTO `members` (`id`, `firstname`,`lastname`, `username`, `gender`, `email`,`contact` , `password`, `role`) VALUES
	(NULL, ?,?,?,?,?,?,?,?)");
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$username=$_POST["username"];
	$gender = $_POST["gender"];
	$pwd = md5($_POST["pwd"]);
	$email = $_POST["email"];
	$contact = $_POST["contact"];
	$role = 'member';
	$query->bind_param('ssssssss', $fname,$lname, $username, $gender, $email,$contact, $pwd, $role); //bind the parameters
	if ($query->execute()){  //execute query
	  echo "<font size='3' color='blue'>Register successfully. You may now login your account.</font>";
	}else{
	  echo "<font size='3' color='red'>Register Fail.</font>";
	}
	
}
?>
</html> 

