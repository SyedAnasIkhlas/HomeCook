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


		// Product_id and cook_id are the same thing
		public static function addToCart($con, $product_id, $userLoggedInObj)
		{
			$user = $userLoggedInObj->isLoggedIn();
			$user_id = $userLoggedInObj->getUserId();
			$empty_user_id = $userLoggedInObj->getUserId();

			$ip_address = GetIpAddress::get_ip_address();

			if ($empty_user_id == "") 
			{
				$empty_user_id = 0;
			}

			

			$query = $con->prepare("SELECT * FROM `cook` WHERE id = :product_id");
			$query->bindParam(":product_id",$product_id);
			$query->execute();

			$row = $query->fetch(PDO::FETCH_ASSOC);
			$quantity = $row['quantity'];

			if ($quantity < 1 ) 
			{
				$query = $con->prepare("SELECT * FROM request WHERE cook_id = :product_id AND user_id = :empty_user_id or ip_address = :ip_address");
				$query->bindParam(":product_id",$product_id);
				$query->bindParam(":empty_user_id",$empty_user_id);
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				if ($query->rowCount() > 0) 
				{
					echo "Out of stock... Your Request has been sended to chef, Please check back later.";
					exit();
				}
				else
				{


					$query = $con->prepare("INSERT INTO `request`(`cook_id`, `user_id`,`ip_address` ,`date`) VALUES (:product_id,:user_id,:ip_address,NOW())");
					$query->bindParam(":product_id",$product_id);
					$query->bindParam(":user_id",$empty_user_id);
					$query->bindParam(":ip_address",$ip_address);
					$query->execute();

					echo "Out of stock... Your Request has been sended to chef, Please check back later.";

					exit();
				}
			}
			else
			{

				if ($user == "") 
				{
					$ip_address = GetIpAddress::get_ip_address();

					$query = $con->prepare("SELECT * FROM `visiter_table` WHERE cook_id = :product_id AND ip_address = :ip_address");
					$query->bindParam(":product_id",$product_id);
					$query->bindParam(":ip_address",$ip_address);
					$query->execute();

					if ($query->rowCount() > 0) 
					{
						$query = $con->prepare("DELETE FROM `visiter_table` WHERE cook_id = :product_id AND ip_address = :ip_address");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":ip_address",$ip_address);
						$query->execute();

						//adding one back to quantity in cook table

						$query = $con->prepare("SELECT * FROM `cook` WHERE id = :product_id");
						$query->bindParam(":product_id",$product_id);
						$query->execute();

						$row = $query->fetch(PDO::FETCH_ASSOC);
						$total_quantity = $row['quantity'];
						$add_updated_quantity = intval($total_quantity) + 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->execute();



						
					}
					else
					{
						$query = $con->prepare("INSERT INTO `visiter_table`(`cook_id`, `ip_address`) VALUES (:product_id, :ip_address)");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":ip_address",$ip_address);
						$query->execute();

						

						//remove one from quantity in cook table

						$query = $con->prepare("SELECT * FROM `cook` WHERE id = :product_id");
						$query->bindParam(":product_id",$product_id);
						$query->execute();

						$row = $query->fetch(PDO::FETCH_ASSOC);
						$total_quantity = $row['quantity'];
						$add_updated_quantity = intval($total_quantity) - 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->execute();
					}
				}
				else
				{
					

					$query = $con->prepare("SELECT * FROM `customer_table` WHERE cook_id = :product_id AND user_id = :user_id");
					$query->bindParam(":product_id",$product_id);
					$query->bindParam(":user_id",$user_id);
					$query->execute();
					if ($query->rowCount() > 0) 
					{
						$query = $con->prepare("DELETE FROM `customer_table` WHERE cook_id = :product_id AND user_id = :user_id");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":user_id",$user_id);
						$query->execute();

						

						//adding one back to quantity in cook table

						$query = $con->prepare("SELECT * FROM `cook` WHERE id = :product_id");
						$query->bindParam(":product_id",$product_id);
						$query->execute();

						$row = $query->fetch(PDO::FETCH_ASSOC);
						$total_quantity = $row['quantity'];
						$add_updated_quantity = intval($total_quantity) + 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->execute();

						
						// json_encode
						// (
						//       array("message1" => "Hi", 
						//       "message2" => "Something else")
						//  )
					}
					else
					{
						$query = $con->prepare("INSERT INTO `customer_table`(`cook_id`, `user_id`) VALUES (:product_id, :user_id)");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":user_id",$user_id);
						$query->execute();

						

						//remove one from quantity in cook table

						$query = $con->prepare("SELECT * FROM `cook` WHERE id = :product_id");
						$query->bindParam(":product_id",$product_id);
						$query->execute();

						$row = $query->fetch(PDO::FETCH_ASSOC);
						$total_quantity = $row['quantity'];
						$add_updated_quantity = intval($total_quantity) - 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->execute();


					}
				}


			}
		}





	}
 ?>