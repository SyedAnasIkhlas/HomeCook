<?php 
class UploadImage
{
	public static function imageUploader($name, $id)
	{
		$span_id =  "select_image";
		$numbers = array(1, 2, 3,4,5);
 
		$span_id = $span_id.$numbers[0];
		
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
			$id = "labelId";
		}
		else
		{
			$id = $id;
		}

		return "
			
			<input type='file' name='$name' id='$id' multiple='' accept='image/*'>

			<label for='$id'>
				<div class='imageUploadBox'>	
					<span class='plus_icon'>
						&#43;
					</span>	
				</div>
				<span id='$span_id'>
					No image selected
				</span>
			</label>
		";
	}

	public static function imageUploaderSm($name, $id, $span_id)
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
			$id = "labelId";
		}
		else
		{
			$id = $id;
		}

			return "
			
			<input type='file' name='$name' id='$id' multiple='' accept='image/*'>

			<label for='$id'>
				<div class='imageUploadBoxSm'>	
					<span class='plus_icon_sm'>
						&#43;
					</span>	
				</div>
				<span id='$span_id'>
					No image selected
				</span>
			</label>
		";
		

		
	}


}

 ?>
