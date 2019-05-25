<?php 
	class InputField
	{
		public static function createInputField($type, $placeholder, $name, $value, $required, $class, $id)
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

			if ($class == null) 
			{
				$class = "";
			}
			else
			{
				$class = $class;
			}

			if ($id == null) 
			{
				$id = "";
			}
			else
			{
				$id = $id;
			}

			return "<input type='$type' placeholder='$placeholder'  value='$value' name='$name'  class='$class' id='$id' $required>";
		}

		public static function createTextarea($text, $placeholder, $name,  $rows, $cols, $required, $class, $id)
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

			if ($class == null) 
			{
				$class = "";
			}
			else
			{
				$class = $class;
			}

			if ($id == null) 
			{
				$id = "";
			}
			else
			{
				$id = $id;
			}

			return"<textarea name='$name' placeholder='$placeholder' class='$class' id='$id' rows='$rows' cols='$cols' $required>$text</textarea>";
		}


		
	}
 ?>