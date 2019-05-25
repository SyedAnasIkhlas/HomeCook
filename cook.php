<?php 
	require_once 'includes/classes/InputFields.php';
	require_once 'includes/common/header.php';
	require_once 'includes/classes/UploadImage.php';
	require_once 'includes/connection/config.php';
	require_once 'includes/classes/Countries.php';
	require_once 'includes/classes/City.php';
	require_once 'getCityFromCountry.php';
	require_once 'includes/classes/Modal.php';


	// input fields

	$imageBox = UploadImage::imageUploader("uploadFile[]", "uploadFile");
	$imageBoxSm = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile2", "select_image2");
	$imageBoxSm2 = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile3", "select_image3");
	$titleField = InputField::createInputField("text", "Title", "title", null, "required", null, null);
	$quantityField = InputField::createInputField("number", "Quantity", "quantity", null, "required", null, null);
	$descriptionField = InputField::createTextarea(null, "Description", "description", null, null, "required", null, null);
	$submitButton = InputField::createInputField("submit", null, "upload", "Upload", null, null, null);
	$tagsField = InputField::createTextarea(null, "Tags", "tags", "1", "3", "required", null, null);

	// database getting countries and city
	
	$get_countries = new Countries($con);
	$countries = $get_countries->countries();

	//Modal
	//Add country Model
	//
	
	$country = InputField::createInputField("text", "Country Name", "country", null, null, null, null);

	$image = "<img src='https://img.icons8.com/ios/50/000000/plus-2-math-filled.png'>";
	$title_country = "Add new country";
	$body_country = $country;
	$save_country = "Add";
	$add_country = Modal::createModal(null, $image, $title_country, $body_country, $save_country, "country", "submit", "add");

   
   //Add new city
   
	// $citys = InputField::createInputField("text", "City Name", "city", null, null, null, null);


	$title_city = "Add new city";
	$body_city = "";
	$save_city = "Add";

	$add_city = Modal::createModal(null, $image, $title_city, $body_city, $save_city, "city","submit", "add"); 
	?>
	
	<div class="uploadForm">
		<form action="cooking" method="post" enctype="multipart/form-data">
			<div>
				<?php 
					echo $imageBox; 
					echo $imageBoxSm;
					echo $imageBoxSm2;
				?>

			</div>

			<div class="inputFields">
				<?php 
					echo $titleField;
					echo $descriptionField;
					echo $quantityField;
				 ?>

				 <select name="stock" class="stockControll">
				 	<option value="" selected disabled>Status</option>
				 	<option value="0">Cooked</option>
				 	<option value="1">Cooking</option>
				 </select><br>
				
				<span class="inline_content"> 
				 	<?php 
				 		echo $countries;
				 		echo $add_country;
				 		// echo $city;
				 	 ?>
				</span> 	 
				<!-- Displaying city name from country -->
				
				<span class="inline_content">
					<select name='city' class='city' id="city">
						<option value=''selected disabled>Select City</option>
					</select>
					<?php echo $add_city; ?>
				</span>	
				
				 

				  

				 <?php
				  echo $tagsField;
				  echo $submitButton; 
				  ?>





			</div>

		</form>
	</div>		

 <?php 
	require_once 'includes/common/footer.php';
  ?>