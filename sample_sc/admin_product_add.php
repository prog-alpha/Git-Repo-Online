<?php
// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page.
include_once("navigation.php");
include_once("functions.php");
check_access($_SESSION['role'], "administrator");
?>
<html>
<body>
<h1>Admin - Add Products</h1>
<form align="center" class="pure-form pure-form-aligned" action="admin_manage_product.php" method="post"  enctype="multipart/form-data" >
Product Code	:<br> </label><input type="text" name="product_code"  /><br>
Product Name	:<br> <input type="text" name="product_name" /><br>
Product Desc	:<br> <textarea  name="product_desc" rows="4" cols="20"></textarea> <br>
Select Image	:<br> <input type="file" name="fileToUpload" id="fileToUpload"><br>
Price			:<br> <input type="text" name="price" /><br>
<input type="submit" name="add_product_button" value="Add Product" />
</form><br>
</body>
