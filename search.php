<?php 
	require_once ('common/header.php'); 
	if (isset($_GET['search_query'])) 
	{
		$search_query = $_GET['search_query'];	
		$search_result = SearchResultsProvider::search($con, $userLoggedInObj, $search_query, null, null, null);
		$total_results_found = $search_result['result'];
		$total_products_found = $search_result['product'];
	}

 ?>


<?php echo $total_results_found; ?>
<div class="product-view-area">
<?php
	echo $total_products_found;
?>

 </div>
	

 
<?php require_once ('common/footer.php'); ?>