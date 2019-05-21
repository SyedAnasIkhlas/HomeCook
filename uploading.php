<?php 
	if (isset($_POST["upload"])) 
	{
		
		if(isset($_FILES['uploadFile']))
		{
		    $name_array = $_FILES['uploadFile']['name'];
		    $tmp_name_array = $_FILES['uploadFile']['tmp_name'];
		    $type_array = $_FILES['uploadFile']['type'];
		    $size_array = $_FILES['uploadFile']['size'];
		    $error_array = $_FILES['uploadFile']['error'];
		    for($i = 0; $i < count($tmp_name_array); $i++)
		    {
		        if(move_uploaded_file($tmp_name_array[$i], "images/productImage/".$name_array[$i]))
		        {
		            echo $name_array[$i]." upload is complete<br>";
		        }
		        else 
		        {
		           echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
		        }
			}
		}
	}
 ?>