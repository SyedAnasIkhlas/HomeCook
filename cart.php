<?php 
	require_once 'common/headerWithoutSearchBar.php'; 

	if (isset($_POST['delete'])) 
	{
		$cook_id = $_POST['delete'];
		echo $cook_id;
	}







	
			$user = $userLoggedInObj->isLoggedIn();

			if ($user == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT * FROM `visiter_table` WHERE ip_address = :ip_address");
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				while($row = $query->fetch(PDO::FETCH_ASSOC))
				{
					$cook_id = $row['cook_id'];
					$product_display = ProductDisplay::cart_product_display($con,$cook_id,$userLoggedInObj);
					echo $product_display;
				}
				
				

			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("SELECT * FROM `customer_table` WHERE user_id = :user_id");
				$query->bindParam(":user_id",$user_id);
				$query->execute();

				while($row = $query->fetch(PDO::FETCH_ASSOC))
				{
					$cook_id = $row['cook_id'];
					$product_display = ProductDisplay::cart_product_display($con,$cook_id,$userLoggedInObj);
					echo $product_display;
				}
				


			}
	
?>

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