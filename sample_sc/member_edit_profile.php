
<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
session_start();
if (isset($_SESSION['username'])) {
    echo "Welcome [".$_SESSION['role']."] : ".$_SESSION['username'] ; // When echo'd here, it displays nothing.
	  echo "<li><a href='logout.php'>Logout</a> <li>";
}else{
	header("location:main_login.php");
}
include_once("product.php");
?>

<html>
<body>
<h1>Member Area</h1>
<a href="logout.php">Logout</a> 
</body>

</html>