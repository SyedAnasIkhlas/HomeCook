<?php require_once ('common/header.php'); ?>

<?php 
	echo SearchBarAndCartProvider::create($con, $userLoggedInObj);
 ?>

<?php 

	$query = $con->prepare("SELECT * FROM `cook");
	$query->execute();

	while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
	{
		$id = $row['id'];
		$chef = $row['chef'];
		$title = $row['title'];
		$country_id = $row['country'];

		$imageSrc = "images/productImage/57-H.PNG";

		$Productisplay = ProductDisplay::product_display($id,$chef,"2",$title,$imageSrc,"skr",$country_id);
		echo $Productisplay;
	}

 
 
 	

 ?>


<?php require_once ('common/footer.php'); ?>