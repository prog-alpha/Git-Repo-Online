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
<h1>Products</h1>
<a class='pure-button pure-button-primary' href='view_cart.php'>View Cart</a>
<br><br>
<?php
$connect=mysqli_connect('localhost', 'root', '','demo');
$query = $connect->prepare("SELECT * FROM products ORDER BY id ASC");
$query->execute();
$query->bind_result($id, $product_code,$product_name, $product_desc, $product_img_name, $price);
echo "<table class='pure-table pure-table-horizontal' align='center'";
echo "<tr><th>Id</th>";
echo "<th>Product Image</th>";
echo "<th>Product Name</th><th>Product Description</th><th>Price</th><td></td></tr>";
$odd = 1; 
while($query->fetch())
{
	if($odd%2){
		echo "<tr class='pure-table-odd'>";
	}else{
		echo "<tr>";
	}
	echo "<td>".$id."</td>";
	echo "<td><img class='pure-img' height='100' width='100' src='images/".$product_img_name."'></td>";
	echo "<td>".$product_name."</td>";
	echo "<td>".$product_desc."</td>"; 
	echo "<td>".$price."</td>"; 
	echo "<td>";
	echo '<form method="post" action="cart_update.php">';
	echo '<input type="hidden" name="product_qty" value="1" size="3" />';
	echo '<input type="hidden" name="product_code" value="'.$product_code.'" />';
	echo '<input type="hidden" name="product_name" value="'.$product_name.'" />';
	echo '<input type="hidden" name="price" value="'.$price.'" />';
	echo '<input type="hidden" name="return_url" value="product.php" />';
	echo '<input type="submit" name="add_to_cart" value="Add To Cart" />';
	echo '</form>';
	echo "</td>";
	echo "</tr>";	
	$odd++;
}
echo "</table>";
?>
</body>
<?php
//display footer
include_once("footer.php");
?>
</html>
