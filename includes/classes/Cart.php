<?php 
	require_once 'GetIpAddress.php';
	require_once 'Product.php';
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
		public static function addToCartUser($con, $product_id, $userLoggedInObj)
		{
			$user = $userLoggedInObj->isLoggedIn();
			$user_id = $userLoggedInObj->getUserId();
			$empty_user_id = $userLoggedInObj->getUserId();

			$ip_address = GetIpAddress::get_ip_address();

			if ($empty_user_id == "") 
			{
				$empty_user_id = 0;
			}

			$customer_table = $con->prepare("SELECT * FROM `customer_table` WHERE cook_id = :product_id AND user_id = :user_id");
					$customer_table->bindParam(":product_id",$product_id);
					$customer_table->bindParam(":user_id",$user_id);
					$customer_table->execute();

			$visiter_table =  $con->prepare("SELECT * FROM `visiter_table` WHERE cook_id = :product_id AND ip_address = :ip_address");
					$visiter_table->bindParam(":product_id",$product_id);
					$visiter_table->bindParam(":ip_address",$ip_address);
					$visiter_table->execute();

			

			$query = $con->prepare("SELECT * FROM `cook` WHERE id = :product_id");
			$query->bindParam(":product_id",$product_id);
			$query->execute();

			$row = $query->fetch(PDO::FETCH_ASSOC);
			$quantity = $row['quantity'];
			$price = $row['price'];

			//new query to check if product is in customer table
			
			if ($visiter_table->rowCount() > 0) 
			{
				$quantity = $quantity + 1;
			}
			else if ($customer_table->rowCount() > 0) 
			{
				$quantity = $quantity + 1;
			}

			//end of new query

			if ($quantity < 1 ) 
			{
				$query = $con->prepare("SELECT * FROM request WHERE cook_id = :product_id AND user_id = :empty_user_id or ip_address = :ip_address");
				$query->bindParam(":product_id",$product_id);
				$query->bindParam(":empty_user_id",$empty_user_id);
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				if ($query->rowCount() > 0) 
				{
					
					$stock = "Out of stock... Your Request has been sended to chef, Please check back later.";
					return json_encode(array("stock" => $stock));
					exit();
				}
				else
				{


					$query = $con->prepare("INSERT INTO `request`(`cook_id`, `user_id`,`ip_address` ,`date`) VALUES (:product_id,:user_id,:ip_address,NOW())");
					$query->bindParam(":product_id",$product_id);
					$query->bindParam(":user_id",$empty_user_id);
					$query->bindParam(":ip_address",$ip_address);
					$query->execute();

					$stock = "Out of stock... Your Request has been sended to chef, Please check back later.";
					return json_encode(array("stock" => $stock));
					exit();
				}
			}
			else
			{

				if ($user == "") 
				{
					$ip_address = GetIpAddress::get_ip_address();

					;

					if ($visiter_table->rowCount() > 0) 
					{
						$query = $con->prepare("DELETE FROM `visiter_table` WHERE cook_id = :product_id AND ip_address = :ip_address");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":ip_address",$ip_address);
						$query->execute();

						//adding one back to quantity in cook table

						$quantity;
						$add_updated_quantity = intval($quantity) + 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity WHERE id = :product_id");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->bindParam(":product_id",$product_id);
						$query_update->execute();

						$cart = -1;
						$add_to_table_button_text = "Add To Table";			
						$add_to_table_button_class = "add-to-table blue";			
						return json_encode(
							array(
						 	"quantity"=>$quantity,
						  	'buttonText' => $add_to_table_button_text,
						  	"buttonClass"=>$add_to_table_button_class 
						));
					


						
					}
					else
					{
						$query = $con->prepare("INSERT INTO `visiter_table`(`cook_id`, `ip_address`,`price`) VALUES (:product_id, :ip_address,:price)");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":ip_address",$ip_address);
						$query->bindParam(":price",$price);
						$query->execute();

						

						//remove one from quantity in cook table

						$quantity;
						$add_updated_quantity = intval($quantity) - 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity WHERE id = :product_id");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->bindParam(":product_id",$product_id);
						$query_update->execute();

						$cart = +1;			
						$add_to_table_button_text = "Remove From Table";			
						$add_to_table_button_class = "add-to-table red";			
						return json_encode(
							array(
						 	"quantity"=>$quantity,
						  	'buttonText' => $add_to_table_button_text,
						  	"buttonClass"=>$add_to_table_button_class 
						));
					}
				}
				else
				{
					

					
					if ($customer_table->rowCount() > 0) 
					{
						$query = $con->prepare("DELETE FROM `customer_table` WHERE cook_id = :product_id AND user_id = :user_id");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":user_id",$user_id);
						$query->execute();

						

						//adding one back to quantity in cook table

						$quantity;
						$add_updated_quantity = intval($quantity) + 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity WHERE id = :product_id");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->bindParam(":product_id",$product_id);
						$query_update->execute();

						$cart = -1;			
						$add_to_table_button_text = "Add To Table";			
						$add_to_table_button_class = "add-to-table blue";			
						return json_encode(
							array(
						 	"quantity"=>$quantity,
						  	'buttonText' => $add_to_table_button_text,
						  	"buttonClass"=>$add_to_table_button_class 
						));

						
						// json_encode
						// (
						//       array("message1" => "Hi", 
						//       "message2" => "Something else")
						//  )
					}
					else
					{
						$query = $con->prepare("INSERT INTO `customer_table`(`cook_id`, `user_id`,price) VALUES (:product_id, :user_id, :price)");
						$query->bindParam(":product_id",$product_id);
						$query->bindParam(":user_id",$user_id);
						$query->bindParam(":price",$price);
						$query->execute();

						

						//remove one from quantity in cook table

						$quantity;
						$add_updated_quantity = intval($quantity) - 1;

						$query_update = $con->prepare("UPDATE `cook` SET quantity = :add_updated_quantity WHERE id = :product_id");
						$query_update->bindParam(":add_updated_quantity",$add_updated_quantity);
						$query_update->bindParam(":product_id",$product_id);
						$query_update->execute();

						$cart = +1;			
						$add_to_table_button_text = "Remove From Table";			
						$add_to_table_button_class = "add-to-table red";			
						return json_encode(
							array(
						 	"quantity"=>$quantity,
						  	'buttonText' => $add_to_table_button_text,
						  	"buttonClass"=>$add_to_table_button_class 
						));


					}

					// return json_encode(array( "quantity"=>$quantity,"stock"=>$stock));
				}


			}


		}//end of function
	





	}
 ?>