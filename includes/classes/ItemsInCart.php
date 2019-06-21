<?php 
require_once 'GetIpAddress.php';
	class ItemsInCart
	{

		public static function totalItemsInCart($con, $cook_id, $userLoggedInObj)
		{
			if ($userLoggedInObj->isLoggedIn() == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT * FROM `visiter_table` WHERE cook_id = :cook_id AND ip_address = :ip_address");
				$query->bindParam(":cook_id",$cook_id);
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				

				if ($query->rowCount() != 0) 
				{
					echo "inCart";
				}
				else
				{
					echo "notInCart";
				}	

			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("SELECT * FROM `customer_table` WHERE cook_id = :cook_id AND user_id = :user_id");
				$query->bindParam(":cook_id",$cook_id);
				$query->bindParam(":user_id",$user_id);
				$query->execute();

				if ($query->rowCount() != 0) 
				{
					echo "inCart";
				}
				else
				{
					echo "notInCart";
				}
			}
		}

	}
 ?>