<?php 
require_once 'GetIpAddress.php';
	class ItemsInCart
	{

		public static function totalItemsInCart($con, $userLoggedInObj)
		{
			if ($userLoggedInObj->isLoggedIn() == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT * FROM `visiter_table` WHERE ip_address = :ip_address");
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				if ($query->rowCount() == 0) 
				{
					echo "Nothing in cart";
				}
				
				while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
				{
					$product_id = $row['cook_id'];
					echo "amas";
				}
				

			
			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("SELECT * FROM `customer_table` WHERE user_id = :user_id");
				$query->bindParam(":user_id",$user_id);
				$query->execute();
				if ($query->rowCount() == 0) 
				{
					echo "Nothing in cart";
				}
				while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
				{
					$product_id = $row['cook_id'];
					echo "amas";
				}
				
			}



		}

	}
 ?>