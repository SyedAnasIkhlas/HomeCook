<?php 
	require_once 'includes/classes/InputFields.php';
	require_once 'includes/common/header.php';
	require_once 'includes/classes/UploadImage.php';
	require_once 'includes/connection/config.php';
	require_once 'includes/classes/Countries.php';
	require_once 'includes/classes/City.php';
	require_once 'getCityFromCountry.php';


	// input fields

	$imageBox = UploadImage::imageUploader("uploadFile[]", "uploadFile");
	$imageBoxSm = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile2", "select_image2");
	$imageBoxSm2 = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile3", "select_image3");
	$titleField = InputField::createInputField("text", "Title", "title", null, "required");
	$stockField = InputField::createInputField("number", "Stock", "stock", null, "required");
	$descriptionField = InputField::createTextarea(null, "Description", "description", null, null, "required");
	$submitButton = InputField::createInputField("submit", null, "upload", "Upload", null);

	// database getting countries and city
	
	$get_countries = new Countries($con);
	$countries = $get_countries->countries();

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
					echo $stockField;
				 ?>

				 <select name="stock" class="stockControll">
				 	<option value="" selected disabled>Stock</option>
				 	<option value="0">In Stock</option>
				 	<option value="1">In Progress</option>
				 	<option value="2">out Of Stock</option>
				 </select><br>
				
				 
				 	<?php 
				 		echo $countries;
				 		// echo $city;
				 	 ?>
				<!-- Displaying city name from country -->
				
				<select name='city' class='city' id="city">
					<option value=''selected disabled>Select City</option>
				</select>
				
				 

				  

				 <?php echo $submitButton; ?>





			</div>

		</form>
	</div>		

 <?php 
	require_once 'includes/common/footer.php';
  ?>