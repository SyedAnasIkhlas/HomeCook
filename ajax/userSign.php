<?php 
	require_once '../includes/connection/config.php';
	require_once '../includes/classes/GetIpAddress.php';
	
	// User signup and signin
		$ip_address = GetIpAddress::get_ip_address();
		$email = $_POST["email"];
		$password = sha1($_POST["password"]);
		$username = $_POST["username"];
		$recovery_email = $_POST["recovery_email"];
		$phone_number = $_POST["phone_number"];
		$country = 0;
		$city = 0;
		$question = $_POST["question"];
		$answer = $_POST["answer"];

		$username =  ucwords($username);
		$username = str_replace("Chef", "", $username);
		$chef_name =  ucwords($username);

		$imagesDir = '../images/userImage/defaultUserPicture/';

		$images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

		$randomImage = $images[array_rand($images)]; // See comments
		$randomImage = str_replace("../", "", $randomImage);


		$query = $con->prepare("SELECT * FROM `chef` WHERE email = :email");
		$query->bindParam(":email",$email);
		$query->execute();

		if ($query->rowCount() != 0 ) 
		{
			echo "Email already in use";
			exit();
		}
		else
		{

			$query = $con->prepare("SELECT * FROM `chef` WHERE phone_number = :phone_number");
			$query->bindParam(":phone_number",$phone_number);
			$query->execute();

			if ($query->rowCount() != 0 ) 
			{
				echo "phone";
				exit();
			}
			else
			{
				$query = $con->prepare("SELECT * FROM `chef` WHERE chef_name = :username");
				$query->bindParam(":username",$chef_name);
				$query->execute();

				if ($query->rowCount() > 1 ) 
				{
					echo "user";
					exit();
				}
		
				else
				{
					$query = $con->prepare("INSERT INTO `chef`(`chef_name`, `email`, `password`, `country_id`,
											 `city_id`, `phone_number`, `recovery_email`,
											  `recovery_question`, `recovery_answer`, `user_picture`,`ip_address`,
											   `date_signup`) VALUES (:username,:email,:password,
											   :country, :city,:phone_number,:recovery_email,:recovery_question,
											   :recovery_answer, :user_picture, :ip_address, NOW())");
					$query->bindParam(":username",$chef_name);
					$query->bindParam(":email",$email);
					$query->bindParam(":password",$password);
					$query->bindParam(":country",$country);
					$query->bindParam(":city",$city);
					$query->bindParam(":phone_number",$phone_number);
					$query->bindParam(":recovery_email",$recovery_email);
					$query->bindParam(":recovery_question",$question);
					$query->bindParam(":recovery_answer",$answer);
					$query->bindParam(":ip_address",$ip_address);
					$query->bindParam(":user_picture",$randomImage);

					$query->execute();

					if ($query) 
					{
						echo "newuser";
						//header('Location: index.php');
					}
					else
					{
						echo "error";
					}
				}
			}
		}

 ?>