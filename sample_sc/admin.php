<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
include_once("navigation.php");
include_once("functions.php");
check_access($_SESSION['role'], "administrator");
?>
<html>
<body>
<h1>Admin - Manage Members @</h1>
<?php
$connect=mysqli_connect("localhost","root","","demo");
if (!$connect){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

//insert 
if(isset($_POST["insert_record"])){    //check if insert button is clicked
	$name=$_POST["name"];   //retrieve form input using post method
	$mobile=$_POST["mobile"];//retrieve form input using post method
	//Prepared statements provide developers with the ability to create queries that are more secure.
	$query = $connect->prepare("insert into customers(name, mobile) values(?, ?)");   //prepare sql query
	//Bind variables for the parameter markers in the SQL statement that was passed to prepare().
	$query->bind_param('sd', $name,$mobile);   //i-integer, d-double, s-string, b-blob
	$query->execute();  //execute query
	header('Location: index.php');//clear cache on page
}

if(isset($_POST["edit_member_button"])){
	$id=$_POST["id"]; 
	$fname=$_POST["fname"];  
	$lname=$_POST["lname"];  
	$uname=$_POST["uname"];   
	$gender=$_POST["gender"];  
	$email=$_POST["email"];  
	$contact=$_POST["contact"];  

	$query=$connect->prepare("update members set firstname=? ,lastname=? ,username=? , gender=? ,email=? ,contact=? where id=?");
	$query->bind_param("sssssii",$fname,$lname,$uname, $gender,$email, $contact, $id );
	$query->execute();
}

//delete
//note: we are making use of the url links to pass the operation, id, itemname and costprice details...
//hence to retreive these values you need to use GET operation
if(isset($_GET['operation'])){
	if($_GET['operation']=="delete")
	{
		$id=$_GET["id"];
		$query=$connect->prepare("delete from members where id='$id'");	
		$query->execute();
		$query=$connect->prepare("ALTER TABLE customers AUTO_INCREMENT =1;"); //Reset auto increment Value
		$query->execute();
	}
}

$query=$connect->prepare("select * from members");
$query->execute();
$query->bind_result($id, $fname, $lname, $uname, $gender, $email,$contact,$password, $role);
echo "<table class='pure-table pure-table-horizontal' align='center'";
echo "<tr><th>Id</th>";
echo "<th>Firstname</th>";
echo "<th>Lastname</th>";
echo "<th>Username</th>";
echo "<th>Gender</th><th>Email</th><th>Contact</th><th>Role</th><td></td><td></td></tr>";
$odd = 1; 
while($query->fetch())
{
	if($odd%2){
		echo "<tr class='pure-table-odd'>";
	}else{
		echo "<tr>";
	}
	echo "<td>".$id."</td>";
	echo "<td>".$fname."</td>";
	echo "<td>".$lname."</td>";
	echo "<td>".$uname."</td>";
	echo "<td>".$gender."</td>"; 
	echo "<td>".$email."</td>";
	echo "<td>".$contact."</td>";
	echo "<td>".$role."</td>";
	//note: we are making use of the url links to pass the operation, id, name and mobile
	//hence to retreive these values you need to use GET operation
	echo "<td><a class='pure-button pure-button-active' href='edit_member.php?id=".$id."&fname=".$fname."&lname=".$lname."&uname=".$uname."&gender=".$gender."&email=".$email."&contact=".$contact."&role=".$role."'>edit</a></td>";  
	echo "<td><a class='pure-button pure-button-active' href='admin.php?operation=delete&id=".$id."'>delete</a></td>";
	echo "</tr>";	
	$odd++;
}
echo "</table>";
?>
</body>

</html>