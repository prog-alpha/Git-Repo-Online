<nav>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
<div align="right" class="pure-menu pure-menu-open pure-menu-horizontal">
    <ul>
<?php

session_start();
if (isset($_SESSION['username'])) {
	echo "<li>Welcome ".$_SESSION['username']."  [".$_SESSION['role']."] </li>" ; // When echo'd here, it displays nothing.
	if($_SESSION['role'] == "member"){
		//echo "<li>Welcome ".$_SESSION['username']."  [".$_SESSION['role']."] </li>" ; // When echo'd here, it displays nothing.
		//echo "<a href='logout.php'> Logout</a> ";
		echo "<li><a href='index.php'>Home</a></li>";
        echo "<li class='pure-menu-selected'><a href='product.php'>Products</a></li>";
        echo "<li><a href='view_cart.php'>Cart</a></li>";
        //echo "<li><a href='contact_us.php'>Contact Us</a></li>";
		//echo "<li><a href='login.php'>Login</a></li>";
		//echo "<li><a href='register.php'>Sign Up</a></li>";
		 echo "<li><a href='logout.php'>Logout</a> <li>";
	}else if($_SESSION['role'] == "administrator"){
		echo "<li><a href='index.php'>Home</a></li>";
		echo "<li class='pure-menu-selected'><a href='admin.php'>Manage Members</a></li>";
		echo "<li><a href='admin_manage_product.php'>Manage Products</a></li>";
		echo "<li><a href='logout.php'>Logout</a> <li>";
	}
}else{
		//header("location:login.php");
		echo "<li><a href='index.php'>Home</a></li>";
        echo "<li class='pure-menu-selected'><a href='product.php'>Products</a></li>";
        echo "<li><a href='view_cart.php'>Cart</a></li>";
        //echo "<li><a href='contact_us.php'>Contact Us</a></li>";
		echo "<li><a href='login.php'>Login</a></li>";
		echo "<li><a href='register.php'>Sign Up</a></li>";
	    
}
echo "<li><form class='pure-form' action='search.php' method='post'>";
echo "<input type='text' name='sname' class='pure-input-rounded'>";
echo "<button type='submit' name='search' class='pure-button'><img class='pure-img' height='15' width='15' src='icon/search-icon.png'></button></li>";
//echo "<button type='submit' name='search' class='pure-button'>sss</button>";
echo "</form></li>";
?>
    </ul>
</div>
</nav>