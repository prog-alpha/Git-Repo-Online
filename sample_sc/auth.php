<?php
session_start();

function authenticate( $myusername, $mypassword)
{
	if(empty($myusername) || empty($mypassword))
	{
		die("UserName or password is empty!");
	}
	// encrypt password
	$encrypted_mypassword=md5($mypassword);
	$connection = mysqli_connect("localhost", "root", "","demo" )or die("cannot connect");
	$sql=$connection->prepare("SELECT * FROM members WHERE username='$myusername' and password='$encrypted_mypassword'");
	//$sql->bind_param('ss',$myusername, $mypassword );
	$result=$sql->execute();
	$sql->bind_result($id, $firstname, $lastname, $username, $gender, $email, $contact, $password, $role);
	// If result matched $myusername and $mypassword
	if($sql->fetch()){
		// Register $role, $myusername, $mypassword and redirect to respective user page
		$_SESSION['role'] = $role;
		$_SESSION['username'] = $username;
		if ($_SESSION['role'] == "member") {
			// redirect user to member page if role is member
			header("location:product.php");
		}else if($_SESSION['role'] == "administrator") {
			// redirect user to admin page if role is admin
			header("location:admin.php");
		}
	} else{
		echo "Invalid user or wrong password";
	}
}

// username and password grab from form by post operation
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
authenticate( $myusername, $mypassword);
?>