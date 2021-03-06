<?php 
	class InputField
	{
		public static function createInputField($type, $placeholder, $name, $value, $required, $class, $id, $onclick)
		{
			if($placeholder == null)
			{
				$placeholder = "";
			}
			else
			{
				$placeholder = $placeholder; 
			}

			if($onclick == null)
			{
				$onclick = "";
			}
			else
			{
				$onclick = $onclick; 
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

			return "<input type='$type' placeholder='$placeholder'  value='$value' name='$name'  class='$class' id='$id' $required onclick='$onclick'> ";
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

		//Implement if required
		//if ($class == null) 
		// {
		// 	$output = "<input type='$type' placeholder='$placeholder'  value='$value' name='$name'  id='$id' $required>";
		// }
		// else
		// {
		// 	$output = "<input type='$type' placeholder='$placeholder'  value='$value' name='$name' id='$id'$required>";
		// }

		// if ($id == null) 
		// {
		// 	$output = "<input type='$type' placeholder='$placeholder'  value='$value' name='$name'  class='$class' $required>";
		// }
		// else
		// {
		// 	$output = "<input type='$type' placeholder='$placeholder'  value='$value' name='$name'  class='$class'$required>";
		// }

		// if ($id == null AND $class == null) 
		// {
		// 	$output = "<input type='$type' placeholder='$placeholder'  value='$value' name='$name' $required>";
		// }
		// else
		// {
		// 	$output = "<input type='$type' placeholder='$placeholder'  value='$value' name='$name' class='$class' id='$id 
		// 	$required>";
		// }


		
	}
 ?>