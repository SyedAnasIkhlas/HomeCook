<?php  
	//cart and table are the same things
	//
	session_start();
	
	require_once '../includes/classes/User.php';
	require_once '../includes/classes/Cart.php';
	require_once '../includes/connection/config.php';
	require_once '../includes/classes/Product.php';
 
	//header("location:../");
	 	$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
 		$userLoggedInObj = new User($con, $usernameLoggedIn);

	
	//getting total items in cart
		if (isset($_POST['cart'])) 
		{	
			$items_in_cart = Cart::totalItemsInCart($con, $userLoggedInObj);
			echo $items_in_cart;	
		}
	
		if (isset($_POST['product_id'])) 
		{
			$product_id = $_POST['product_id'];
			$cart = Cart::addToCartUser($con, $product_id, $userLoggedInObj);
			echo $cart;	
		}
		
		//getting updated quantity
		if (isset($_POST['quantity'])) 
		{
			$product_id = $_POST['quantity'];
			$product = new Product($con, $product_id);
			$quantity = $product->getQuantity();
			echo $quantity;	
		}

 ?>