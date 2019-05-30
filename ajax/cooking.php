<?php 
	require_once '../includes/connection/config.php';

	if (isset($_POST["cook"])) 
	{
		$chef = "REMOVE THIS FROM COOKING.PHP";

		// checking for title
		if ($_POST["title"] == "") 
		{
			return "Please add title";
		}
		else
		{
			$title = $_POST["title"];
		}

		// checking for quantity
		if ($_POST["quantity"] == "") 
		{
			return "Please add quantity";
		}
		else
		{
			$quantity = $_POST["quantity"];
		}

		// checking for description
		if ($_POST["description"] == "") 
		{
			return "Please add description";
		}
		else
		{
			$description = $_POST["description"];
		}


		// checking for tags
		if ($_POST["tags"] == "") 
		{
			return "Please add tags";
		}
		else
		{
			$tags = $_POST["tags"];
		}

		echo "fine";


	}











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
		        if(move_uploaded_file($tmp_name_array[$i], "images/productImage/". uniqid() .$name_array[$i]))
		        {
		            echo $name_array[$i]." upload is complete<br>";
		            echo $tem_name;
		        }
		        else 
		        {
		           echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
		           echo $tem_name;
		        }
			}
		}

		
	}
 ?>