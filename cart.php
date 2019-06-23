<?php require_once 'common/headerWithoutSearchBar.php'; 
	echo ProductDisplay::cart_product_display($con,64,$userLoggedInObj);
?>


	
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