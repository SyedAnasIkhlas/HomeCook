<?php 
	//cart and table are the same things
	//
	
	require_once '../includes/classes/User.php';
	require_once '../includes/classes/Cart.php';
	require_once '../includes/connection/config.php';

	$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
	$userLoggedInObj = new User($con, $usernameLoggedIn);
	
	if (isset($_POST['product_id'])) 
	{
		$product_id = $_POST['product_id'];
		
		$cart = Cart::addToCart($con, $product_id, $userLoggedInObj);

		echo $cart;

		//return Cart::totalItemsInCart($con, $userLoggedInObj)
	}


 ?>