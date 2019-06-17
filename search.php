<?php 
	require_once ('common/header.php'); 
	if (isset($_GET['search_query'])) 
	{
		$search_query = $_GET['search_query'];	
	}

 ?>



<div class="product-view-area">
<?php
	$query = $con->prepare("SELECT * FROM cook WHERE tags LIKE CONCAT('%', :search_query, '%')
                            OR chef LIKE CONCAT('%', :search_query, '%')");
	$query->bindParam(":search_query",$search_query);
	$query->execute();

	if ($total = $query->rowCount()>1) 
	{
		while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
	{
		$cook_id = $row["id"];
		$product = ProductDisplay::product_display($con, $cook_id);
		 
		echo $product;
 	} 

	}
	else
	{
		echo $total;
	}



	
 ?>

 </div>
	

 
<?php require_once ('common/footer.php'); ?>