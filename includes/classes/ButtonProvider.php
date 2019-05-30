<?php 

	class ButtonProvider
	{
		public static function createButton($text, $class, $id, $image, $action)
		{
			if($image == null)
			{
				$image = "";
			}
			else
			{
				$image = $image;
			}

			if($action == null)
			{
				$action = "";
			}
			else
			{
				$action = $action;
			}

			if($class == null)
			{
				$class = "";
			}
			else
			{
				$class = $class;
			}

			if($id == null)
			{
				$id = "";
			}
			else
			{
				$id = $id;
			}

			return "
				<button class='$class' id='id' onclick='action'>
					<img src='$image' alt='>
					<span class='text'>$text</span>
				</button>	

					";
		}



	}
 ?>