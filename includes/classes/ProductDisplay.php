<?php 

	require_once 'Product.php';
	class ProductDisplay
	{
		public static function product_display($con, $cook_id)
		{
			$product = new Product($con, $cook_id);

			$chef_id = $product->getChefId();
			$chef_name = $product->getChefName();
			$product_id = $product->getProductId();
			$productTile = $product->getTitle();
			$imageSrc = $product->getImage();
			$country_code = $product->getCountryCode();
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

				return"
						<div class='main-product-container' >
						
							<div class='country-name' title='$country_name'>
								<span class='country-name-text'>
									<a href='search?c_id=$country_id'>$country_code</a>
								</span>
								
							</div>
						
							<div class='product-container'>
						
								<a class='product-title' href='dish?p_id=$product_id' title='$productTile'>
									<span class='title'>
										$productTile
									</span>
								</a>
						
								<a class='product-image' href='dish?p_id=$product_id'>
									<img src='$imageSrc' alt='$imageSrc'>	
								</a>
						
								<div class='add-to-table' title='Add To Table' onclick='addToTable($product_id)'>
									<span>Add To Table</span>
									<img src='assets/icons/table-white.png' class='table_icon'>
								</div>
						
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
		
		}
	
 ?>