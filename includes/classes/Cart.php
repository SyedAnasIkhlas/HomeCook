<?php 
	require_once 'GetIpAddress.php';
	class Cart
	{
		public static function totalItemsInCart($con, $userLoggedInObj)
		{
			$user = $userLoggedInObj->isLoggedIn();

			if ($user == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT * FROM `visiter_table` WHERE ip_address = :ip_address");
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				$total_numbers = $query->rowCount();
				

			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("SELECT * FROM `customer_table` WHERE user_id = :user_id");
				$query->bindParam(":user_id",$user_id);
				$query->execute();

				$total_numbers = $query->rowCount();


			}

			return $total_numbers;

		}




	}
 ?>