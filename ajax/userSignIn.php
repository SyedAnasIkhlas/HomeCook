<?php 
	require_once '../includes/connection/config.php';
	
		$signInSource = $_POST['signInSource'];
		$passwordByUser = sha1($_POST['password']);

		$query = $con->prepare("SELECT * FROM `chef` WHERE chef_name = :signInSource OR email = :signInSource OR phone_number = :signInSource");
		$query->bindParam(":signInSource",$signInSource);
		$query->bindParam(":password",$password);
		$query->execute();

		if ($query->rowCount() > 0) 
		{
			

				while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
				{
					$phone = $row['phone_number'];
					$password = $row['password'];
					$chef_name = $row['chef_name'];
				}
					
				if ($passwordByUser ==  $password) 
				{
					echo "found 1";	
					echo $chef_name;
					$_SESSION["chef_name"] = $chef_name; 
				}	
				else
				{
					echo "password does't match";
				}
		}
		else
		{
			echo "try'n change query";
		}
 ?>