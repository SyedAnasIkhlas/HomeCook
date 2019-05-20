<?php 
	class InputField
	{
		public static function createInputField($type, $placeholder, $name)
		{
			if($placeholder == null)
			{
				$placeholder = "";
			}
			else
			{
				$placeholder = $placeholder; 
			}

			if($name == null)
			{
				$name = "";
			}
			else
			{
				$name = $name; 
			}

			return "<input type='$type' placeholder='$placeholder' name='$name'>";
		}

		public static function createTextarea($text, $placeholder, $name,  $rows, $cols)
		{
			if($rows == null)
			{
				$rows = 10;
			}

			if( $cols == null)
			{
				$cols = 60;
			}

			if ($name == null) 
			{
				$name = $name;
			}

			if ($text == null) 
			{
				$text = $text;
			}

			return"<textarea name='$name' placeholder='$placeholder' rows='$rows' cols='$cols'>$text</textarea>";
		}


		
	}
 ?>