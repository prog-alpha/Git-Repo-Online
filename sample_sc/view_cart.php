<html>
<head>
<title>View shopping cart</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
</head>
<?php
//display navigation bar
include_once("navigation.php");
?>
<body>
<center><h1>View Cart</h1>
 <a href="product.php">Continue Shopping</a> </center>
 <?php
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		$cart_items = 0;
		echo "<br><table class='pure-table pure-table-horizontal' align='center'";
		echo "<tr><th>Name</th>";
		echo "<th>Price</th>";
		echo "<th>Quantity</th><th></th><td></td></tr>";
		foreach ($_SESSION["products"] as $cart_itm)
        {
			echo '<form class="pure-form" method="post" action="cart_update.php">';
			$product_code = $cart_itm["code"];
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);
			echo "<tr><td>".$cart_itm["name"]."<br>Qty:".$cart_itm["qty"]."</td>";
			echo "<td>".$cart_itm["price"]."</td>";
			echo "<td>";
			echo "<input class='pure-input-rounded' type='text' name='product_qty' value='".$cart_itm["qty"]."' size='3' />";
			echo "<input type='hidden' name='product_code' value='".$cart_itm["code"]."' />";
			echo "<input type='hidden' name='return_url' value='view_cart.php'/>";
			echo "</td>";
			echo "<td><input type='submit' name='add_to_cart' value='Update' />";
			echo "<input type='submit' name='remove_from_cart' value='Remove' /></td>";
			echo "</tr>";	
			echo '</form>';
        }
		echo "<tr>";
		echo "<td><a class='pure-button pure-button-primary' href='cart_update.php?emptycart=1'>Empty Cart</a></td>";
		echo "<td></td>";
		echo "<td><strong>Total: $".$total."</strong></td>";
		echo "<td><a class='pure-button pure-button-active' href=''>Pay Now</a></tr>";
    	echo "</table>";
		echo '</form>';
		
    }else{
		echo '<br><center>Your Cart is empty';
	}
?>
</body>

</html>
