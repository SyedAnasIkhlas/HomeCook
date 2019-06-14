<?php require_once ('common/header.php'); ?>

<?php 
	echo SearchBarAndCartProvider::create($con, $userLoggedInObj);

	$cook_id = 59;

	$product = new Product($con, $cook_id);
	echo $product->getImage(); 
 ?>
	

 
<?php require_once ('common/footer.php'); ?>