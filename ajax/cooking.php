<?php 
	require_once '../includes/connection/config.php';


	$errors = "";
	$error_code_page_link = "<a href='../help/error_codes.php'>Error codes</a>";
	$error_codes = "Please, visit our ".$error_code_page_link." page to exactly find out why you are facing this error and how you can fix them. Please copy the code";

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
				$query_find = $con->prepare("SELECT * FROM cook WHERE title = :title AND tags = :tags");
				$query_find->bindParam(":title",$title);	
				$query_find->bindParam(":tags",$tags);	
				$query_find->execute();

				if ($query_find) 
				{
					while ($row = $query_find->fetch(PDO::FETCH_ASSOC)) 
					{
						$cook_id = $row['id'];
					}

					$images_ref = $cook_id."-".$cook_id;

					$name_array = $_FILES['uploadFile']['name'];
				    $tmp_name_array = $_FILES['uploadFile']['tmp_name'];
				    $type_array = $_FILES['uploadFile']['type'];
				    $size_array = $_FILES['uploadFile']['size'];
				    $error_array = $_FILES['uploadFile']['error'];

				    for($i = 0; $i < count($tmp_name_array); $i++)
				    {
				        if(move_uploaded_file($tmp_name_array[$i], "../images/productImage/". $cook_id. "-" .$name_array[$i]))
				        { 
				            $filepath = "images/productImage/". $cook_id. "-" .$name_array[$i];

				            $query = $con->prepare("INSERT INTO `dishes`(`cook_id`, `filepath`, `images_ref`) VALUES (:cook_id,:filepath,:images_ref)");
				            $query->bindParam(":cook_id",$cook_id);
				            $query->bindParam(":filepath",$filepath);
				            $query->bindParam(":images_ref",$images_ref);
				            $query->execute();

				            if ($query) 
				            {
				            	$img_query = $con->prepare("UPDATE `cook` SET `images_ref`= :images_ref WHERE id = :cook_id");
				            	$img_query->bindParam(":images_ref",$images_ref);
				            	$img_query->bindParam(":cook_id",$cook_id);
				            	$img_query->execute();
				            	
				            	if ($query) 
				            	{
				            		echo "images and data uploaded";
				            	}
				            	
				            }

				        }
				        else 
				        {
				           echo "error code:picx023"; 
				           echo $error_codes;         
				        }
					}
				}


			}
			else
			{
				echo "error code:dbpx024";
				echo $error_codes;
			}
		}

		


	}

 ?>