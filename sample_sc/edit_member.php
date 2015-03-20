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
<h1>Edit Member</h1>
<form align="center" class="pure-form pure-form-aligned" action="admin.php" method="post">
First Name	:<br> </label><input type="text" name="fname" value="<?php echo $_GET['fname'] ?>" /><br>
Last Name	:<br> <input type="text" name="lname" value="<?php echo $_GET['lname'] ?>" /><br>
Username	:<br> <input type="text" name="uname"  value="<?php echo $_GET['uname'] ?>"/><br>

Gender	:<br></label><select name="gender">
<?php 
	if($_GET['gender'] == "Male")
	{
		echo "<option value=''> </option>";
        echo "<option value='Male' selected>Male</option>";
        echo "<option value='Female'>Female</option>";
	}else if ($_GET['gender'] == "Female"){
		echo "<option value=''> </option>";
        echo "<option value='Male' >Male</option>";
        echo "<option value='Female' selected>Female</option>";
	}else{
		echo "<option value=''> </option>";
        echo "<option value='Male' >Male</option>";
        echo "<option value='Female' >Female</option>";	
	}

?>
</select><br />
Email	:<br> <input type="text" name="email"  value="<?php echo $_GET['email'] ?>"/><br>
Contact	:<br> <input type="text" name="contact"  value="<?php echo $_GET['contact'] ?>"/><br>
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
<input type="submit" name="edit_member_button" value="Edit" />
</form><br>
</body>
