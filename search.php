<?php 
	require_once ('common/header.php'); 
	if (isset($_GET['search_query'])) 
	{
		$search_query = $_GET['search_query'];		
	}	

 ?>
		<?php SearchResultsProvider::search_filter($con, $userLoggedInObj, $search_query); ?>


 <div class="search-container">

	<div class="results-found">
		<?php echo SearchResultsProvider::total_search_results_found($con, $userLoggedInObj, $search_query); ?>
	</div>	
	<div class="product-view-area">
		<?php
			$search_result = SearchResultsProvider::search($con, $userLoggedInObj, $search_query, null, null, null);
		?>
	</div>
	
</div>
 
<?php require_once ('common/footer.php'); ?>