<?php 
	class InputField
	{
		public static function createInputField($type, $placeholder, $name, $value, $required)
		{
			if($placeholder == null)
			{
				$placeholder = "";
			}
			else
			{
				$placeholder = $placeholder; 
			}

			if($required == null)
			{
				$required = "";
			}
			else
			{
				$required = $required; 
			}

			if($value == null)
			{
				$value = "";
			}
			else
			{
				$value = $value; 
			}

			if($name == null)
			{
				$name = "";
			}
			else
			{
				$name = $name; 
			}

			return "<input type='$type' placeholder='$placeholder' value='$value' name='$name' $required>";
		}

		public static function createTextarea($text, $placeholder, $name,  $rows, $cols, $required)
		{
			if($rows == null)
			{
				$rows = 10;
			}

			if( $cols == null)
			{
				$cols = 60;
			}

			if ($required == null) 
			{
				$required = "";
			}
			else
			{
				$required = $required;
			}

			if ($name == null) 
			{
				$name = $name;
			}

			if ($text == null) 
			{
				$text = $text;
			}

			return"<textarea name='$name' placeholder='$placeholder' rows='$rows' cols='$cols' $required>$text</textarea>";
		}


		
	}
 ?>