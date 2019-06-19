<?php require_once ('common/header.php'); ?> 

<div class="product-view-area">
<?php
	$query = $con->prepare("SELECT * FROM cook");
	$query->execute();

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
	{
		$cook_id = $row["id"];
		$product = ProductDisplay::product_display($con, $cook_id);
		 
	echo $product;
 	} 

 ?>

 </div>
	

 
<?php require_once ('common/footer.php'); ?>