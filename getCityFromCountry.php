<?php 
	require_once 'includes/classes/City.php';
	require_once'includes/connection/config.php';

	if (isset($_POST['country_id'])) 
	{
		$country_id = $_POST['country_id'];

		$get_city = new City($con, $country_id);
		$city = $get_city->city();
		echo $city;
	}
?>