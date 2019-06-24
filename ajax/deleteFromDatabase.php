<?php 
	require_once '../includes/classes/GetIpAddress.php';
	require_once ('../includes/connection/config.php');
	require_once ('../includes/classes/User.php');
	
		$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
 		$userLoggedInObj = new User($con, $usernameLoggedIn);

	if (isset($_POST['product_id'])) 
	{
		$product_id = $_POST['product_id'];

		$user = $userLoggedInObj->isLoggedIn();

			if ($user == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();

				$query = $con->prepare("DELETE FROM `visiter_table` WHERE ip_address = :ip_address AND cook_id = :product_id");
				$query->bindParam(":ip_address",$ip_address); 
				$query->bindParam(":product_id",$product_id); 
				$query->execute();

				
				
				

			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("DELETE FROM `customer_table` WHERE cook_id = :product_id AND user_id = :user_id");  
				$query->bindParam(":user_id",$user_id); 
				$query->bindParam(":product_id",$product_id); 
				$query->execute();
			}

			if ($query) 
			{
				echo "Del";
			}
			else
			{
				echo "error";
			}
	}

 ?>