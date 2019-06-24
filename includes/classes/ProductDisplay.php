<?php 

	require_once 'Product.php';

	class ProductDisplay
	{
		public static function product_display($con, $cook_id, $userLoggedInObj)
		{
			$product = new Product($con, $cook_id);

			$chef_id = $product->getChefId();
			$chef_name = $product->getChefName();
			$product_id = $product->getProductId();
			$productTile = $product->getTitle();
			$productPrice = $product->getPrice();
			$imageSrc = $product->getImage();
			$country_code = $product->getCountryCode();
			$description = $product->getDescription();
			$country_name = $product->getCountryName();
			$country_id = $product->getCountryId();
			$status = $product->getStatus();
			$quantityVal = $product->getQuantity();

			if ($quantityVal > 0) 
			{
				$quantity = "
						<div class='stock-indicater green' title='$quantityVal in Stock'>
							<span class='stock-indicater-text'>
								In
							</span>
						</div>";
			}
			else
			{
				$quantity = "
						<div class='stock-indicater red' title='$quantityVal in Stock'>
							<span class='stock-indicater-text'>
								Out
							</span>
						</div>";
			}



		
			if ($userLoggedInObj->isLoggedIn() == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT * FROM `visiter_table` WHERE cook_id = :cook_id AND ip_address = :ip_address");
				$query->bindParam(":cook_id",$cook_id);
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				

				if ($query->rowCount() != 0) 
				{
					$addToTable  ="
					<div class='add-to-table red' title='Remove From Table' onclick='addToTable(this, $product_id)'>
						<span id='tableText'>Remove From Table</span>
						<img src='assets/icons/table-white.png' class='table_icon'>
					</div>";
				}
				else
				{
					$addToTable  ="
					<div class='add-to-table blue' title='Add To Table' onclick='addToTable(this, $product_id)'>
						<span id='tableText'>Add To Table</span>
						<img src='assets/icons/table-white.png' class='table_icon'>
					</div>";
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
					$addToTable  ="
					<div class='add-to-table red' title='Remove From Table' onclick='addToTable(this, $product_id)'>
						<span id='tableText'>Remove From Table</span>
						<img src='assets/icons/table-white.png' class='table_icon'>
					</div>";
				}
				else
				{
					$addToTable  ="
					<div class='add-to-table blue' title='Add To Table' onclick='addToTable(this, $product_id)'>
						<span id='tableText'>Add To Table</span>
						<img src='assets/icons/table-white.png' class='table_icon'>
					</div>";
				}	
			}

			if ($productPrice <= 1) 
			{
				$riyal = "Riyal";
			}
			else
			{
				$riyal = "Riyals";
			}

				return"
						<div class='main-product-container' >

							
							<div class='country-name' title='$country_name'>
								<span class='country-name-text'>
									<a href='search?c_id=$country_id'>$country_code</a>
								</span>
								
							</div>
						
							<div class='product-container'>

							<div class='priceContainer' title='$productPrice $riyal only.'>
								<span class='price'>$productPrice <span class='black'>$riyal</span></span>
							</div>

						
								<a class='product-title' href='dish?p_id=$product_id' title='$productTile'>
									<span class='title'>
										$productTile
									</span>
								</a>
						
								<a class='product-image' href='dish?p_id=$product_id' title='$description'>
									<img src='$imageSrc' alt='$imageSrc'>	
								</a>
						
								$addToTable
						
								<div class='product-chef-name' title='Chef Name'>
									<a class='chef_name_provider' href='kitchen?chef_id=$chef_id' >
										<span class='default-chef'>
											Chef:
										</span>
										<span class='chef'>
											$chef_name
										</span>
										
									</a>
								</div>	
							</div>

							$quantity

						</div>";
			}

			public static function cart_product_display($con, $cook_id, $userLoggedInObj)
			{
				$product = new Product($con, $cook_id);

				$chef_id = $product->getChefId();
				$chef_name = $product->getChefName();
				$product_id = $product->getProductId();
				$productTitle = $product->getTitle();
				$productPrice = $product->getPrice();
				$imageSrc = $product->getImage();
				$country_code = $product->getCountryCode();
				$description = $product->getDescription();
				$country_name = $product->getCountryName();
				$country_id = $product->getCountryId();
				$status = $product->getStatus();
				$quantityVal = $product->getQuantity();

				$length = 50;

				if ( strlen($description) > $length) 
				{
					$description = substr($description,0,$length) . '...';
				}
				else
				{
					$description = $description;
				}

				if ( strlen($productTitle) > $length) 
				{
					$productTitle = substr($productTitle,0,$length) . '...';
				}
				else
				{
					$productTitle = $productTitle;
				}
				


				if ($userLoggedInObj->isLoggedIn() == "") 
				{
					$ip_address = GetIpAddress::get_ip_address();
					$query = $con->prepare("SELECT * FROM `visiter_table` WHERE cook_id = :cook_id AND ip_address = :ip_address");
					$query->bindParam(":cook_id",$cook_id);
					$query->bindParam(":ip_address",$ip_address);
					$query->execute();

					$row = $query->fetch(PDO::FETCH_ASSOC);
					$quantityAddedToCart = $row['quantity'];

				}
				else
				{
					$user_id = $userLoggedInObj->getUserId();
					$query = $con->prepare("SELECT * FROM `customer_table` WHERE cook_id = :cook_id AND user_id = :user_id");
					$query->bindParam(":cook_id",$cook_id);
					$query->bindParam(":user_id",$user_id);
					$query->execute();
					$row = $query->fetch(PDO::FETCH_ASSOC);
					$quantityAddedToCart = $row['quantity'];

				}

				if ($productPrice <= 1) 
				{
					$riyal = "Riyal";
				}
				else
				{
					$riyal = "Riyals";
				}

					return"
							<div class='itemsContainer'>
								<div class='checkBox'>
									<input type='radio' name='delete' value='$product_id'>
								</div>

							<a href='dish?p_id=$product_id'>
								 <div class='image'>
								 	<img src='$imageSrc' alt='$productTitle'>
								 </div>
							 </a>

							 <div class='title-description'>
							 	<div class='title'>
							 		<a href='dish?p_id=$product_id'>$productTitle</a>
							 	</div>

							 	<div class='description'>
							 		$description
							 	</div>

							 	<div class='stock-left' title='$quantityVal left in stock'>
							 		<span class='stock-color'><span class='black'>$quantityVal </span> left in stock  </span>
							 	</div>
							 </div>

							 <div class='price'>
							 	$productPrice SR
							 </div>

							 <div class='quantity'>
							 	<input type='number' value='$quantityAddedToCart'>
							 </div>

						</div>";
				}
		
		}
	
 ?>