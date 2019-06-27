<html>
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
		<link rel="stylesheet" type="text/css" href="assets/css/uploadPage.css">
</html>

<?php 
	session_start();
		require_once 'includes/connection/config.php'; 
		require_once 'includes/classes/User.php';
		require_once 'includes/classes/GetIpAddress.php';
		$usernameLoggedIn = isset($_SESSION['chef_name']) ? $_SESSION['chef_name'] : "" ;
 		$userLoggedInObj = new User($con, $_SESSION['chef_name']); 
		
 	$ip_address = GetIpAddress::get_ip_address();
	$errors = "";
	$error_code_page_link = "<a href='../homecook/help/error_codes?$errors'>Error codes</a>";
	$error_codes = "Please, visit our".$error_code_page_link."page to find out exactly why you are facing these errors and how you can fix them.
		Please copy the code";

	if (isset($_POST["cook"]))
	{ 
		$chef = $userLoggedInObj->getUsername();
		$price = $_POST["price"];

		// checking for title
		if ($_POST["title"] == "") 
		{
			echo "Please add a title";
			$errors .= "Please add a title<br>";
		}
		else
		{
			$title = $_POST["title"];
		}

		// checking for quantity
		if ($_POST["quantity"] == "") 
		{
			echo "Please add quantity";
			$errors .= "Please add quantity<br>";
		}
		else
		{
			$quantity = $_POST["quantity"];
		}

		// checking for description
		if ($_POST["description"] == "") 
		{
			echo "Please add description";
			$errors .= "Please add description<br>";
		}
		else
		{
			$description = $_POST["description"];
		}


		// checking for country
		if ($_POST["country"] == "") 
		{
			echo "Please add country";
			$errors .= "Please add country<br>";
		}
		else
		{
			$country = $_POST["country"];
		}

		// checking for city
		
			$city = "No City";


		// checking for status
		if ($_POST["status"] == "") 
		{
			echo "Please add status";
			$errors .= "Please add status<br>";
		}
		else
		{
			$status = $_POST["status"];
		}


		// checking for tags
		if ($_POST["tags"] == "") 
		{
			echo "Please add tags";
			$errors .= "Please add tags<br>";
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

			$query = $con->prepare("INSERT INTO `cook`( `chef`, `title`, `description`,`price`, `country`, `city`, `status`, `quantity`, `tags`, `images_ref`, `date`, `ip_address`) VALUES (:chef,:title,:description,:price,:country,:city,:status,:quantity,:tags,'1',NOW(),:ip_address)");
			$query->bindParam(":chef",$chef);
			$query->bindParam(":title",$title);
			$query->bindParam(":price",$price);
			$query->bindParam(":description",$description);
			$query->bindParam(":country",$country);
			$query->bindParam(":city",$city);
			$query->bindParam(":status",$status);
			$query->bindParam(":quantity",$quantity);
			$query->bindParam(":tags",$tags);
			$query->bindParam(":ip_address",$ip_address);
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
				        if(move_uploaded_file($tmp_name_array[$i], "images/productImage/". $cook_id. "-" .$name_array[$i]))
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
				            		header("location:index");
				            	}
				            	
				            }

				        }
				        else 
				        {
				           $errors .= "Error code:picx023<br>"; 
				           //echo $error_codes;         
				        }
					}
				}


			}
			else
			{
				 $errors .= "Error code:dbpx024";
				//echo $error_codes;
			}
		}

		
		if ($errors != "") 
		{
			echo "<div class='upload_error_message'><p>Your data has been uploaded to the database, but we are facing some problems on uploading your images.</p><span class='red'>$errors</span><br>$error_codes</div>";
		}
		else
		{
			header("location:index");
		}

	}


 ?>