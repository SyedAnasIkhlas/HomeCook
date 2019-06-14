<?php 
	require_once 'includes/classes/InputFields.php';
	require_once 'includes/classes/ButtonProvider.php';
	require_once 'common/header.php';
	require_once 'includes/classes/UploadImage.php';
	require_once 'includes/connection/config.php';
	require_once 'includes/classes/Countries.php';
	require_once 'includes/classes/City.php';
	require_once 'getCityFromCountry.php';
	require_once 'includes/classes/Modal.php';
	require_once 'includes/classes/User.php';



	if (!isset($_SESSION['chef_name'])) 
	{
		header("location:signIn");
	}


	// input fields 
	$imageBox = UploadImage::imageUploader("uploadFile[]", "dish1");
	$imageBoxSm = UploadImage::imageUploader("uploadFile[]", "dish2");
	$imageBoxSm2 = UploadImage::imageUploader("uploadFile[]", "dish3");
	// $imageBoxSm = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile2", "select_image2"); 
	// $imageBoxSm2 = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile3", "select_image3"); 
	$titleField = InputField::createInputField("text", "Title", "title", null, "required", null, null, null);
	$quantityField = InputField::createInputField("number", "Total Plates", "quantity", null, "required", null, null, null);
	$descriptionField = InputField::createTextarea(null, "Description", "description", null, null, "required", null, null);
	$tagsField = InputField::createTextarea(null, "Tags", "tags", "1", "3", "required", null, null);
	$submitButton = InputField::createInputField("submit", null, "cook", "Cook", null, null, "cook", "cook()");
	?>
	
	<div class="uploadForm">

	
		<form action="cooking" method="post" id="cook" enctype="multipart/form-data">
			<div class="imagesDisplay">
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

				 <select name="status" class="stockControll" required>
				 	<option value="" selected disabled>Status</option>
				 	<option value="0">Cooked</option>
				 	<option value="1">Cooking</option>
				 </select><br>
				
				<span class="inline_content"> 

				 <select name="country" class="country" id='country' required>
				 	<option value="" selected disabled>which country dish is this?</option>
				 </select>

				</span> 	 
				
				 <?php
				  echo $tagsField;
				  echo $submitButton; 
				  ?>

				  <!-- <button type="button" class="button btn-green" name="cook" onclick="cook()">Cook</button> -->

				<!-- <button type="button" class="button btn-green" name="cook" onclick="cookIt()">Cook</button> -->



			</div>

		</form>


	</div>



 <?php 
	require_once 'common/footer.php';
  ?>
