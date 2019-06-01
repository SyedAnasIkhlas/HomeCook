<?php 
	require_once '../includes/connection/config.php';

		
		// if(isset($_FILES['uploadFile']))
		// {
		// 	$cook_id = 
		//     $name_array = $_FILES['uploadFile']['name'];
		//     $tmp_name_array = $_FILES['uploadFile']['tmp_name'];
		//     $type_array = $_FILES['uploadFile']['type'];
		//     $size_array = $_FILES['uploadFile']['size'];
		//     $error_array = $_FILES['uploadFile']['error'];

		//     for($i = 0; $i < count($tmp_name_array); $i++)
		//     {
		//     	$image_ref = 
		//         if(move_uploaded_file($tmp_name_array[$i], "../images/productImage/". $cook_id .$name_array[$i]))
		//         {
		//             echo $name_array[$i]." upload is complete<br>";
		//             echo "../images/productImage/". uniqid() .$name_array[$i];
		            
		//         }
		//         else 
		//         {
		//            echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
		           
		//         }
		// 	}
		// }

	



	$errors = "";

	if (isset($_POST["cook"])) 
	{
		$chef = "REMOVE THIS FROM COOKING.PHP";

		// checking for title
		if ($_POST["title"] == "") 
		{
			echo "Please add a title";
			$errors .= "Please add a title";
		}
		else
		{
			$title = $_POST["title"];
		}

		// checking for quantity
		if ($_POST["quantity"] == "") 
		{
			echo "Please add quantity";
			$errors .= "Please add quantity";
		}
		else
		{
			$quantity = $_POST["quantity"];
		}

		// checking for description
		if ($_POST["description"] == "") 
		{
			echo "Please add description";
			$errors .= "Please add description";
		}
		else
		{
			$description = $_POST["description"];
		}


		// checking for country
		if ($_POST["country"] == "") 
		{
			echo "Please add country";
			$errors .= "Please add country";
		}
		else
		{
			$country = $_POST["country"];
		}

		// checking for city
		if ($_POST["city"] == "") 
		{
			echo "Please add city";
			$errors .= "Please add city";
		}
		else
		{
			$city = $_POST["city"];
		}

		// checking for status
		if ($_POST["status"] == "") 
		{
			echo "Please add status";
			$errors .= "Please add status";
		}
		else
		{
			$status = $_POST["status"];
		}


		// checking for tags
		if ($_POST["tags"] == "") 
		{
			echo "Please add tags";
			$errors .= "Please add tags";
		}
		else
		{
			$tags = $_POST["tags"];
		}
		if (!$errors == "")
		{
			echo " Please fill the following fileds";
			return "Their please fill the following fileds";
		}
		else
		{
			echo "fine";

			$query = $con->prepare("INSERT INTO `cook`( `chef`, `title`, `description`, `country`, `city`, `status`, `quantity`, `tags`, `images_ref`, `date`) VALUES (:chef,:title,:description,:country,:city,:status,:quantity,:tags,'1',NOw())");
			$query->bindParam(":chef",$chef);
			$query->bindParam(":title",$title);
			$query->bindParam(":description",$description);
			$query->bindParam(":country",$country);
			$query->bindParam(":city",$city);
			$query->bindParam(":status",$status);
			$query->bindParam(":quantity",$quantity);
			$query->bindParam(":tags",$tags);
			//$query->bindParam(":images_id",$images_id);
			$query->execute();

			if ($query) 
			{
				echo "success";
			$query_find = $con->prepare("SELECT id FROM cook WHERE title = :title");
			$query_find->bindParam(":title",$title);	
			$query_find->execute();

			if ($query_find) 
			{
				echo "wor";
			}

			// $cook_id = "";
		 //    $name_array = $_FILES['uploadFile']['name'];
		 //    $tmp_name_array = $_FILES['uploadFile']['tmp_name'];
		 //    $type_array = $_FILES['uploadFile']['type'];
		 //    $size_array = $_FILES['uploadFile']['size'];
		 //    $error_array = $_FILES['uploadFile']['error'];

		 //    for($i = 0; $i < count($tmp_name_array); $i++)
		 //    {
		 //    	$image_ref = 
		 //        if(move_uploaded_file($tmp_name_array[$i], "../images/productImage/". $cook_id .$name_array[$i]))
		 //        {
		 //            echo $name_array[$i]." upload is complete<br>";
		 //            echo "../images/productImage/". uniqid() .$name_array[$i];
		            
		 //        }
		 //        else 
		 //        {
		 //           echo "move_uploaded_file function failed for ".$name_array[$i]."<br>";
		           
		 //        }
			// }


			}
			else
			{
				echo "Failed";
			}
		}

		


	}

 ?>