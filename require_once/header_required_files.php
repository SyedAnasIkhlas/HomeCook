<?php 
	session_start();
		require_once ('../homecook/includes/connection/config.php');
		require_once ('../homecook/includes/classes/User.php');
		require_once ('../homecook/includes/classes/ProductDisplay.php');
		require_once '../homecook/includes/classes/SearchBarAndCartProvider.php';
		require_once '../homecook/includes/classes/Product.php';
		require_once ('../homecook/includes/classes/Cart.php');

		
		$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
 		$userLoggedInObj = new User($con, $usernameLoggedIn);
?>