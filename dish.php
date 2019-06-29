<?php 
	require_once 'common/header.php';
	if (!isset($_GET['p_id'])) 
	{
		 echo " 
		 <div class='no-product-found-container'>
		 	<img src='https://img.icons8.com/ios/50/000000/error.png'>
		 	<span>No product found</span>
		 </div>";
	}

 ?>


