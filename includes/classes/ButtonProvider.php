<?php 

	class ButtonProvider
	{
		public static function createButton($text, $class, $image, $action)
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

			return "
				<button class='$class' onclick='action'>
					<img src="$image" alt="">
					<span class='text'>$text</span>
				</button>	

					";
		}



	}
 ?>