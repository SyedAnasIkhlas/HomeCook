<?php 
	require_once 'includes/classes/InputFields.php';
	require_once 'includes/common/header.php';

	$titleField = InputField::createInputField("text", "Title", "title");
	$descriptionField = InputField::createTextarea(null, "Description", "description", null, null);
?>
	
	<div class="uploadForm">
		<form action="index" method="POST">
			
			<div class="imageUploadBox">
				<span>&#43;</span>	
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





			</div>

		</form>
	</div>	
	

 <?php 
	require_once 'includes/common/footer.php';
  ?>