<?php 
		session_start();
		
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
					$chef_email = $row['email'];
				}
					
				if ($passwordByUser ==  $password) 
				{
					//echo "found 1";
					$_SESSION['chef_name'] = $chef_name; 

					if (isset($_SESSION['chef_name'])) 
					{
						echo "toKitchen";	
					}
					
					
				}	
				else
				{
					//echo "password does't match";
					echo "passerror";
				}
		}
		else
		{
			echo "try'n change query";
		}
 ?>