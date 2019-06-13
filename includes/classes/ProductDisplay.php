<?php 
	class ProductDisplay
	{
		public static function product_display($chef_id,$chef_name,$product_id,$productTile,
												$imageSrc,$country_name,$country_id)
		{
			
				return"<div class='main-product-container' >
								
									<div class='country-name' title='Country'>
										<span class='country-name-text'>
											<a href='search?c_id=$country_id'>$country_name</a>
										</span>
										
									</div>
								
									<div class='product-container'>
								
										<a class='product-title' href='dish?p_id=$product_id'>
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
								</div>";
				
		}
	}
 ?>