<?php require_once 'common/headerWithoutSearchBar.php'; ?>

<div id="cart-items">
	<?php echo Cart::cook_id_of_items_in_cart($con, $userLoggedInObj); ?>
</div>


<div id="price-for-cart">

	<div id="price-sub-text">
		Total:
	</div>
	
	<div class="inline-price-tag">
		<div id="price-sub-text">
			SR
		</div>
		<div id="price-value">
		<?php 	
			$cart = Cart::cartTotal($con, $userLoggedInObj);
			echo $cart;		 
		?>
		</div>
	</div>
</div>

<div class='cart-main-functions'>
	<button class="button remove-button btn-red" onclick='updateCart()'>Remove seleted items</button>
	<button class="button update-button btn-green" onclick=''>Update cart</button>
	<button class="button checkout-button btn-blue" onclick=''>Serve It</button>


</div>


	
	<!-- <div class='itemsContainer'>
		<?php 
			// $product = new Product($con, 64);
			// $title =  $product->getTitle();
			// $pic =  $product->getImage();
			// $description =  $product->getDescription();
			// $price =  $product->getPrice();
			// $quantity = ;
		 ?>
			<div class='checkBox'>
				<input type='radio'>
			</div>

		 <div class='image'>
		 	<img src='<?php //echo $pic; ?>' alt='<?php $title; ?>'>
		 </div>
		 <div class='title-description'>
		 	<div class='title'>
		 		<?php 
		 			//echo $title;
		 		 ?>
		 	</div>

		 	<div class='description'>
		 		<?php 
		 			////echo $description;
		 		 ?>
		 	</div>

		 	<div class="stock-left" title='$quantity left in stock'>
		 		<span class='stock-color'><span class='black'>$quantity </span> left in stock  </span>
		 	</div>
		 </div>

		 <div class='price'>
		 	<?php //echo $price; ?>
		 </div>

		 <div class='quantity' >
		 	<input type="number" value='<?php //echo $quantity; ?>'>
		 </div>

	</div> -->




<?php require_once 'common/footerWithouSearchBar.php'; ?>