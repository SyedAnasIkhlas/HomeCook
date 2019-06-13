<?php 
	require_once '../includes/connection/config.php';
	require_once '../includes/classes/Countries.php';

		$get_countries = new Countries($con);
		$countries = $get_countries->customerCountries();
		echo $countries;




 ?>