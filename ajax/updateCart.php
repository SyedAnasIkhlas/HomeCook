<?php 
session_start();
require_once '../includes/connection/config.php';
require_once '../includes/classes/User.php';
require_once '../includes/classes/Cart.php';
require_once '../includes/classes/GetIpAddress.php';
		
		$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
 		$userLoggedInObj = new User($con, $usernameLoggedIn);

	if (isset($_POST['product_id'])) 
	{
		$product_id = $_POST['product_id'];
		$updated_quantity = $_POST['inputValue'];

		$query = $con->prepare("SELECT * FROM cook WHERE id=:product_id");
		$query->bindParam(":product_id",$product_id);
		$query->execute();

		$row = $query->fetch(PDO::FETCH_ASSOC);
		$price = $row['price'];

		$total_price = $updated_quantity*$price;

		$user = $userLoggedInObj->isLoggedIn();

			if ($user == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT * FROM `visiter_table` WHERE ip_address = :ip_address AND cook_id = :product_id");
				$query->bindParam(":ip_address",$ip_address);
				$query->bindParam(":product_id",$product_id);
				$query->execute();
				$row = $query->fetch(PDO::FETCH_ASSOC);
				$quantity = $row['quantity'];

				$query = $con->prepare("UPDATE `visiter_table` SET `quantity` = :quantity, `price` = :price  WHERE cook_id =:product_id AND ip_address = :ip_address");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":ip_address",$ip_address);
						$query->bindParam(":price",$total_price);
						$query->bindParam(":quantity",$updated_quantity);
						$query->execute();

			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("SELECT * FROM `customer_table` WHERE user_id = :user_id AND cook_id = :product_id");
				$query->bindParam(":user_id",$user_id);
				$query->bindParam(":product_id",$product_id);
				$query->execute();

				$row = $query->fetch(PDO::FETCH_ASSOC);
				$quantity = $row['quantity'];	


				$query = $con->prepare("UPDATE `customer_table` SET `quantity` = :quantity, `price` = :price WHERE cook_id =:product_id AND user_id = :user_id");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":user_id",$user_id);
						$query->bindParam(":price",$total_price);
						$query->bindParam(":quantity",$updated_quantity);
						$query->execute();	
			}

			$cart = Cart::cartTotal($con, $userLoggedInObj);
			echo $cart;




			
	}
	else
	{
		echo "not connted properly";
	}


 ?>