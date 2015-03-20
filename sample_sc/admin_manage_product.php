<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
include_once("navigation.php");
include_once("functions.php");
check_access($_SESSION['role'], "administrator");
?>
<html>
<body>
<h1>Admin - Manage Products</h1>
<br>
<a class='pure-button pure-button-primary' href='admin_product_add.php'>Add New Product</a><br><br>
<?php
$connect=mysqli_connect("localhost","root","","demo");
if (!$connect){
	die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
}

//insert 
if(isset($_POST["add_product_button"])){    //check if insert button is clicked
	//echo "a"; exit();
	$product_code=$_POST["product_code"];   //retrieve form input using post method
	$product_name=$_POST["product_name"];//retrieve form input using post method
	$product_desc=$_POST["product_desc"];
	//$product_img_name=$_POST["product_img_name"];
	$price=$_POST["price"];
	
	
		//$target_dir = "./images/";
	$target_file = "./images/" . basename($_FILES["fileToUpload"]["name"]);
	$product_img_name= basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) 
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
	}
	
	//Prepared statements provide developers with the ability to create queries that are more secure.
	$query = $connect->prepare("insert into products(id, product_code, product_name, product_desc, product_img_name, price) values(NULL, ?,?,?,?,?)");   //prepare sql query
	//Bind variables for the parameter markers in the SQL statement that was passed to prepare().
	$query->bind_param('ssssd', $product_code,$product_name, $product_desc, $product_img_name, $price);   //i-integer, d-double, s-string, b-blob
	$query->execute();  //execute query
	header('Location: admin_manage_product.php');//clear cache on page
}

if(isset($_POST["edit_product_button"])){
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
		$query=$connect->prepare("delete from products where id='$id'");	
		$query->execute();
		$query=$connect->prepare("ALTER TABLE products AUTO_INCREMENT =1;"); //Reset auto increment Value
		$query->execute();
	}
}

$query=$connect->prepare("select * from products");
$query->execute();
$query->bind_result($id, $product_code, $product_name, $product_desc, $product_img_name, $price);
echo "<table class='pure-table pure-table-horizontal' align='center'";
echo "<tr><th width ='5%'>Id</th>";
echo "<th width ='10%'>Product Name</th>";
echo "<th width ='5%'>Product Code</th>";
echo "<th  width ='60%'>Product Description</th>";
echo "<th  width ='10%'>Product Image</th><th>Price</th><td width ='5%'></td><td width ='5%'></td></tr>";
$odd = 1; 
while($query->fetch())
{
	if($odd%2){
		echo "<tr class='pure-table-odd'>";
	}else{
		echo "<tr>";
	}
	echo "<td>".$id."</td>";
	echo "<td>".$product_name."</td>";
	echo "<td>".$product_code."</td>";
	echo "<td>".$product_desc."</td>";
	echo "<td>".$product_img_name."</td>"; 
	echo "<td>".$price."</td>";
	//note: we are making use of the url links to pass the operation, id, name and mobile
	//hence to retreive these values you need to use GET operation
	echo "<td><a class='pure-button pure-button-active' href='admin_product_edit.php?id=".$id."'>edit</a></td>";  
	echo "<td><a class='pure-button pure-button-active' href='manage_product.php?operation=delete&id=".$id."'>delete</a></td>";
	echo "</tr>";	
	$odd++;
}
echo "<tr><td></td><td></td></tr>";
echo "</table>";
?>
</body>

</html>