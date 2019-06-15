<?php require_once ('common/header.php'); ?>
<?php require_once ('includes/classes/Cart.php'); ?>

<?php 
	echo SearchBarAndCartProvider::create($con, $userLoggedInObj); 

	$query = $con->prepare("SELECT * FROM cook");
	$query->execute();

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
	{
		$cook_id = $row["id"];
		$product = ProductDisplay::product_display($con, $cook_id);
		 
	


	
 ?>

 <div class="product-view-area">
 	<?php echo $product;
 	} ?>
 </div>
	

 
<?php require_once ('common/footer.php'); ?>