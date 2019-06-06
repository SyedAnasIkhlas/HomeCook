<?php 
	require_once '../includes/connection/config.php';
	require_once '../includes/classes/Countries.php';

	//inserting country name

	if (isset($_POST['countryName'])) 
	{
		$country_name = $_POST['countryName'];

		$check_query = $con->prepare("SELECT * FROM countries WHERE country = :country_name" );
		$check_query->bindParam(":country_name",$country_name);
		$check_query->execute();

		if ($check_query->rowCount() != 0) 
		{
			echo "<span class='red'>Country already exists!</span>";
			exit();
		}
		else
		{

			$query = $con->prepare("INSERT INTO `countries` (`country`) VALUES (:country_name)");
			$query->bindParam(":country_name", $country_name);
			$query->execute();
			echo "Country added to list";
		}
	}

	if (isset($_POST["country_id"])) 
	{
		$country_id = $_POST["country_id"];
		$city_name = $_POST["city_name"];

		$check_query = $con->prepare("SELECT `city` FROM `city` WHERE `city` = :city");
		$check_query->bindParam(":city",$city_name);
		$check_query->execute();
	}

	if ($check_query->rowCount() != 0) 
		{
			echo "<span class='red'>City already exists!</span>";
			exit();
		}
		else
		{
			$query = $con->prepare("INSERT INTO city (country_id , city) VALUES (:country_id,:city)");
			$query->bindParam(":country_id",$country_id);
			$query->bindParam(":city",$city_name);
			$query->execute();
			echo "City added";
		}


 ?>