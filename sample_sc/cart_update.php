<?php
	session_start();
	//empty cart by destroying current session
	if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
	{
		session_destroy();
		header('Location:view_cart.php');
	}

	//add item in shopping cart
	if(isset($_POST["add_to_cart"]))
	{
		$product_code 	= $_POST["product_code"]; //product code
		$product_qty 	= $_POST["product_qty"]; //product code
		$return_url 	= $_POST["return_url"]; //return url
		$product_name 	= $_POST["product_name"]; 
		$price 	= $_POST["price"];
		//prepare array for the session variable
		$new_product = array('name'=>$product_name, 'code'=>$product_code, 'qty'=>$product_qty, 'price'=>$price);
		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false
			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["code"] == $product_code){ //the item exist in array
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"]);
					$found = true;
				}else{
					//item doesn't exist in the list, just retrive old info and prepare array for session var
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
				}
			}
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["products"] = array_merge($product, array($new_product));
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["products"] = $product;
			}
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = array($new_product);
		}
		header('Location:'.$return_url);
	}

	//remove item from shopping cart
	if(isset($_POST["remove_from_cart"]))
	{
		$product_code 	= $_POST["product_code"]; //product code
		foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
		{
			if($cart_itm["code"]!=$product_code){ //item does,t exist in the list
				$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
			}
			//create a new product list for cart
			$_SESSION["products"] = $product;
		}
		//redirect back to original page
		header('Location:view_cart.php');
	}
?>