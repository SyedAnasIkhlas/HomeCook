<?php 

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




		// Product_id and cook_id are the same thing second
		public static function addToCart($con, $product_id, $userLoggedInObj)
		{
			$ip_address = GetIpAddress::get_ip_address(); 
			$user = $userLoggedInObj->isLoggedIn();
			$user_id = $userLoggedInObj->getUserId();
			$empty_user_id = 0;
			

			$cook_table = $con->prepare("SELECT * FROM `cook` WHERE id = :product_id");
			$cook_table->bindParam(":product_id",$product_id);
			$cook_table->execute();

			$row_cook_table = $cook_table->fetch(PDO::FETCH_ASSOC);

			$quantity = $row_cook_table['quantity'];
		 	$quantity;

		 	//request table for user

			$request_table_user = $con->prepare("SELECT * FROM `request` WHERE cook_id = :product_id AND user_id = :user_id");
			$request_table_user->bindParam(":product_id",$product_id);
			$request_table_user->bindParam(":user_id",$user_id);
			$request_table_user->execute();

			if ($request_table_user->rowCount() > 1) 
			{//mini first start
				$request_user = "sended";
			}
			else
			{
				$request_user = "not sended";
			}//mini first end

			//request table for ip_Address

			$request_table_ip_address = $con->prepare("SELECT * FROM `request` WHERE cook_id = :product_id AND ip_address = :ip_address");
			$request_table_ip_address->bindParam(":product_id",$product_id);
			$request_table_ip_address->bindParam(":ip_address",$ip_address);
			$request_table_ip_address->execute();

			if ($request_table_ip_address->rowCount() > 1) 
			{//mini first start
				$request_ip_address = "sended";
			}
			else
			{
				$request_ip_address = "not sended";
			}//mini first end

		 	if ($user == "") 
		 	{ //first if
				 		if ($quantity == 0) 
				 		{
				 			if ($request_ip_address == "not sended") 
					 		{
					 			$query_request_user = $con->prepare("INSERT INTO request (`cook_id`,`user_id`,`ip_address`, `date`) VALUES(:product_id, :user_id , :ip_address, NOW())");
					 			$query_request_user->bindParam(":product_id",$product_id);
								$query_request_user->bindParam(":user_id",$empty_user_id);
								$query_request_user->bindParam(":ip_address",$ip_address);
								$query_request_user->execute();

					 			$stock_message = "Out of stock... Your Request has been sended to chef, Please check back later.";
								exit();
					 		}
					 		else
					 		{
					 			$stock_message = "Out of stock... Your Request has been sended to chef, Please check back later.";
								exit();
				 			}
			 			}
			 			else
			 			{
			 				//insert the product in cart and 
			 				$query = $con->prepare("INSERT INTO visiter_table (ip_address, cook_id) VALUES(:ip_address,:cook_id");
			 				$query->bindParam(':ip_address',$ip_address);
			 				$query->bindParam(':product_id',$product_id);
			 				$query->execute();
			 		
			 				//remove one from quantity in cook table
			 				$new_quantity = intval($quantity);
			 				$new_quantity = $new_quantity - 1;
			 				$query_update = $con->prepare("UPDATE cook SET quantity = :new_quantity WHERE id = :product_id");
			 				$query->bindParam(':new_quantity',$new_quantity);
			 				$query->bindParam(':product_id',$product_id);
			 				$query->execute();
			 			}
		 		
					$return =  json_encode(array("stock_message" => $stock_message));
		 			return $return;



		 	}//first if end here
		 	else
		 	{//first else start

		 			$user_id = $userLoggedInObj->getUserId();
		 				if ($quantity == 0) 
				 		{
				 			if ($request_user == "not sended") 
					 		{
					 			$query_request_user = $con->prepare("INSERT INTO request (`cook_id`,`user_id`,`ip_address`, `date`) VALUES(:product_id, :user_id , :ip_address, NOW())");
					 			$query_request_user->bindParam(":product_id",$product_id);
								$query_request_user->bindParam(":user_id",$user_id);
								$query_request_user->bindParam(":ip_address",$ip_address);
								$query_request_user->execute();

					 			$stock_message =  "Out of stock... Your Request has been sended to chef, Please check back later.";
								exit();
					 		}
					 		else
					 		{
					 			$stock_message = "Out of stock... Your Request has been sended to chef, Please check back later.";
								exit();
				 			}
			 			}
			 			else
			 			{
			 				//insert the product in cart and 
			 				$query = $con->prepare("INSERT INTO customer_table (cook_id,user_id) VALUES(:cook_id,:user_id");
			 				$query->bindParam(':product_id',$product_id);
			 				$query->bindParam(':user_id',$user_id);
			 				$query->execute();
			 		
			 				//remove one from quantity in cook table
			 				$new_quantity = intval($quantity);
			 				$new_quantity = $new_quantity - 1;
			 				$query_update = $con->prepare("UPDATE cook SET quantity = :new_quantity WHERE id = :product_id");
			 				$query->bindParam(':new_quantity',$new_quantity);
			 				$query->bindParam(':product_id',$product_id);
			 				$query->execute();
			 			}


			 			$return =  json_encode(array("stock_message" => $stock_message));
			 			return $return;

		 	}//first else end here


		}



			// Product_id and cook_id are the same thing
		public static function addToCartFromIpAddress($con, $product_id)
		{
			$ip_address = GetIpAddress::get_ip_address(); 

			//$return =  json_encode(array("hi" => $$user_id));


		}//end of function
 ?>
 		

