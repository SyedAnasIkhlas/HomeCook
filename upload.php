<?php 
	require_once 'includes/classes/InputFields.php';
	require_once 'includes/common/header.php';
	require_once 'includes/classes/UploadImage.php';

	$imageBox = UploadImage::imageUploader("uploadFile[]", "uploadFile");
	$imageBoxSm = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile2", "select_image2");
	$imageBoxSm2 = UploadImage::imageUploaderSm("uploadFile[]", "uploadFile3", "select_image3");
	$titleField = InputField::createInputField("text", "Title", "title", null, "required");
	$descriptionField = InputField::createTextarea(null, "Description", "description", null, null, "required");
	$submitButton = InputField::createInputField("submit", null, "upload", "Upload", null);
?>
	
	<div class="uploadForm">
		<form action="uploading" method="post" enctype="multipart/form-data">
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
				 ?>

				 <select name="stock" class="stockControll">
				 	<option value="0">In Stock</option>
				 	<option value="1">out Of Stock</option>
				 </select><br>

				 <select name="stock" class="country">
				 	<option value="0">In Stock</option>
				 	<option value="1">out Of Stock</option>
				 </select><br>

				  <select name="stock" class="city">
				 	<option value="0">In Stock</option>
				 	<option value="1">out Of Stock</option>
				 </select><br>

				 <?php echo $submitButton; ?>





			</div>

		</form>
	</div>	
	

 <?php 
	require_once 'includes/common/footer.php';
  ?>