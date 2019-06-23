<?php 
	
	require_once 'Cart.php';
	require_once 'Modal.php';
	require_once 'ItemsInCart.php';
	require_once 'ProductDisplay.php';

	
	

	class SearchBarAndCartProvider
	{
		
		
		public static function create($con, $userLoggedInObj)
		{
			$image = "<img src='assets/icons/plate-white.png' class='cart-image'>";

			if ($userLoggedInObj->isLoggedIn() == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT * FROM `visiter_table` WHERE ip_address = :ip_address");
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				if ($query->rowCount() == 0) 
				{
					$product =  "Nothing in cart";
					$modal = Modal::createModal(null, $image, "Cart", $product,"Checkout","cart", 'cart',null);
				}
				else
				{
					$product = ProductDisplay::product_display($con, $product_id, $userLoggedInObj);

					while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
					{
						$product_id = $row['cook_id'];
						$body = $product_id;
						
						// $body = ItemsInCart::totalItemsInCart($con, $userLoggedInObj);
						$modal = Modal::createModal(null, $image, "Cart", $product,"Checkout","cart", 'cart',null);
					}
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
					$product = "Nothing in cart";
					$modal = Modal::createModal(null, $image, "Cart", $product,"Checkout","cart", 'cart',null);

				}
				else
				{
					$product = ProductDisplay::product_display($con, $product_id, $userLoggedInObj);
					
					while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
					{
						$product_id = $row['cook_id'];
						$body =  $product_id;
						
						
						// $body = ItemsInCart::totalItemsInCart($con, $userLoggedInObj);
						$modal = Modal::createModal(null, $image, "Cart", $product,"Checkout","cart", 'cart',null);
					}
				}	
				
			}

			$total_number = Cart::totalItemsInCart($con, $userLoggedInObj);

			if (isset($_GET['search_query'])) 
			{
				$search_q = $_GET['search_query'];
			}
			else
			{
				$search_q = "";
			}

			return"
			<div class='search-bar-cart visible' title='Search Here'>
				<div class='search-area'>
					<form action='search' method='GET'>
						<input type='text' placeholder='Search' name='search_query' class='search-box' value='$search_q' required>

						<button type='submit' name='search' class='search-button' id='searchButton'>
							<img src='assets/icons/spoon-white.png'>
						</button>
					</form>
				</div>
	
				<div class='icon-wrapper' title='Total Items on Dinning Table'>
					<div class='cart-area'>
						<div class='cart'>
						   
						  <i class='icon-grey'>$modal</i>
						  
						   <span class='badge'>$total_number<q{1: cite='*'}></q></span>
						</div>
					</div>
				</div> 
			</div>";
		}
	}


 ?>