<?php require_once ('includes/common/header.php'); ?>

<div class='main-product-container' >

	<div class='country-name' title='Country'>
		<span class='country-name-text'>
			<a href='#to_all_food_of_this_country'>pkr</a>
		</span>
		
	</div>

	<div class='product-container'>

		<a class='product-title' href='#same_As_image'>
			<span class='title'>
				Biryani
			</span>
		</a>

		<a class='product-image' href='kitchen.php'>
			<img src='images/productImage/-asus-zenfone-5z-5.jpg' alt=''>	
		</a>

		<div class='add-to-table' title='Add To Table' onclick='addToCart(id)'>
			<span>Add To Table</span>
			<img src='assets/icons/table-white.png' class='table_icon'>
		</div>

		<div class='product-chef-name' title='Chef Name'>
			<a class='chef_name_provider' href='kitchen?chef_id=' >
				<span class="default-chef">
					Chef:
				</span>
				<span class='chef'>
					Syed Anas Ikhlas
				</span>
				
			</a>
		</div>
		
		
	</div>




	<div class='stock-indicater' title='Stock'>
		<span class='stock-indicater-text'>
			In
		</span>
	</div>

</div>



<?php require_once ('includes/common/footer.php'); ?>