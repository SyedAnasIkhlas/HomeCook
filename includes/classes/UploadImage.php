<?php 
class UploadImage
{
	public static function imageUploader($name, $id)
	{

		if ($name == null) 
		{
			$name = "image";
		}
		else
		{
			$name = $name;
		}

		if ($id == null) 
		{
			$id = 
		}

		return "
			
			<input type='file' name='$name' id='$id' multiple='' accept='image/*'>

			<label for='$id'>
				<div class='imageUploadBox'>	
					<span>
						&#43;
					</span>	
				</div>
				<span id='select_image'>
					No image selected
				</span>
			</label>
		";
	}

	public static function imageUploaderSm($name, $id)
	{

		if ($name == null) 
		{
			$name = "image";
		}
		else
		{
			$name = $name;
		}

		if ($id == null) 
		{
			$id = 
		}

		return "
			
			<input type='file' name='$name' id='$id' multiple='' accept='image/*'>

			<label for='$id'>
				<div class='imageUploadBoxSm'>	
					<span>
						&#43;
					</span>	
				</div>
				<span id='select_image'>
					No image selected
				</span>
			</label>
		";
	}


}

 ?>