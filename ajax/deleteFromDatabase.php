<?php 
session_start();
	require_once '../includes/classes/GetIpAddress.php';
	require_once ('../includes/connection/config.php');
	require_once ('../includes/classes/User.php');
	require_once ('../includes/classes/Cart.php');
	
		$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
 		$userLoggedInObj = new User($con, $usernameLoggedIn);

	if (isset($_POST['product_id'])) 
	{
		$product_id = $_POST['product_id'];

		$user = $userLoggedInObj->isLoggedIn();

			if ($user == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();

				$query = $con->prepare("DELETE FROM `visiter_table` WHERE cook_id = :product_id AND ip_address = :ip_address");
				$query->bindParam(":ip_address",$ip_address); 
				$query->bindParam(":product_id",$product_id); 
				$query->execute();

				if ($query) 
				{
					echo Cart::cook_id_of_items_in_cart($con, $userLoggedInObj);
				}
				else
				{
					echo Cart::cook_id_of_items_in_cart($con, $userLoggedInObj);
				}

				
				
				

			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("DELETE FROM `customer_table` WHERE cook_id = :product_id AND user_id = :user_id");  
				$query->bindParam(":user_id",$user_id); 
				$query->bindParam(":product_id",$product_id); 
				$query->execute();

				if ($query) 
				{
					echo Cart::cook_id_of_items_in_cart($con, $userLoggedInObj);
				}
				else
				{
					echo Cart::cook_id_of_items_in_cart($con, $userLoggedInObj);
				}
			}

			


				
		}

		if (isset($_POST['cart']))
		{
			$cart = Cart::cartTotal($con, $userLoggedInObj);
			echo $cart;	
		}

		


 ?>