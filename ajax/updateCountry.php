<?php 
	require_once 'includes/connection/config.php';
	require_once 'includes/classes/Countries.php';
	
	if (isset($_POST["update"])) 
	{
		$get_countries = new Countries($con);
		$countries = $get_countries->countries();
		echo $countries;
	}




 ?>