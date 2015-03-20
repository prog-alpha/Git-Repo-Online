<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
include_once("navigation.php");
include_once("functions.php");
check_access($_SESSION['role'], "administrator");
if(isset($_GET["id"]))
{
	$id = $_GET["id"];
	$connect=mysqli_connect("localhost","root","","demo");
	if (!$connect){
		die('Could not connect: ' . mysqli_connect_errno()); //return error is connect fail
	}
	$query=$connect->prepare("select * from products where id=?");
	$query->bind_param('i', $id );
	$query->execute();
	$query->bind_result($id, $product_code, $product_name, $product_desc, $product_img_name, $price);
	$query->fetch();
}
?>
<html>
<body>
<h1>Admin - Edit Products</h1>
<form align="center" class="pure-form pure-form-aligned" action="admin_manage_product.php" method="post"  enctype="multipart/form-data" >
Product Code	:<br> </label><input type="text" name="product_code" value="<?php echo $product_code; ?>" /><br>
<br>Product Name	:<br> <input type="text" name="product_name" value="<?php echo $product_name; ?>" /><br>
<br>Product Desc	:<br> <textarea  name="product_desc" rows="4" cols="20" value="<?php echo $product_desc; ?>"><?php echo $product_desc; ?></textarea> <br>
<br>Select Image	:<?php echo $product_img_name; ?> <br> <input type="file" name="fileToUpload" id="fileToUpload"><br>
<br>Price			:<br> <input type="text" name="price" value="<?php echo $price; ?>" /><br>
<input type="submit" name="edit_product_button" value="Edit Product" />
</form><br>
</body>