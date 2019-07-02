<?php 
	session_start();
	//if its not working add homecook  and ../ in front of req1
		require_once ('includes/connection/config.php');
		require_once ('includes/classes/User.php');
		require_once ('includes/classes/Review.php');
		require_once ('includes/classes/ProductDisplay.php');
		require_once ('includes/classes/CreateUserProfile.php');
		require_once ('includes/classes/ChefDisplay.php');
		require_once ('includes/classes/Chef.php');
		require_once 'includes/classes/SearchBarAndCartProvider.php';
		require_once 'includes/classes/Product.php';
		require_once ('includes/classes/Cart.php');
		require_once ('includes/classes/SearchResultsProvider.php');

		
		$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
 		$userLoggedInObj = new User($con, $usernameLoggedIn);
?>