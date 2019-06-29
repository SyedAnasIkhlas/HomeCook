<?php 

	require_once 'Chef.php';
	require_once 'ChefDisplay.php';
	class SearchResultsProvider
	{

		public static function search_filter($con, $userLoggedInObj, $search_term)
		{
			$query = $con->prepare("SELECT * FROM chef WHERE chef_name LIKE CONCAT('%', :search_term, '%')");
			$query->bindParam(":search_term",$search_term);
			$query->execute();

			if ($query->rowCount() > 0) 
			{
				while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
				{
					$chef_id = $row['id'];
					$chef = new Chef($con, $userLoggedInObj, $chef_id);
					$chef_name = $chef->getChefName();
					$chef_picture_path = $chef->getChefPicture();
					// $chef_country = $chef->getChefNationality();

					$chef_preview = ChefDisplay::create($chef_id,$chef_name, $chef_picture_path);
					echo $chef_preview;


				}
			}
			else
			{
				// echo "no chef found";
			}

		
		}



		public static function search($con, $userLoggedInObj, $search_term,$sort_by,$chef_name,$status)
		{

			if ($chef_name == "") 
			{
				$chef_name = "";
			}

			if ($sort_by == "") 
			{
				$sort_by = "ORDER BY time DESC";
			}

			if ($status == "") 
			{
				$status = "";
			}

			

				$query = $con->prepare("SELECT * FROM cook WHERE  tags LIKE CONCAT('%', :search_term, '%') OR title LIKE CONCAT('%', :search_term, '%') OR chef LIKE CONCAT('%', :search_term, '%')AND quantity != 0");
				$query->bindParam(":search_term",$search_term);
				$query->execute();

				while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
				{
					$cook_id = $row["id"];
					$quantity = $row['quantity'];

					

					$product = ProductDisplay::product_display($con, $cook_id, $userLoggedInObj);
					$product_data = array('product' => $product); 

					if ($quantity == 0) 
					{
						// $product = "";
					}

					echo $product;

			 	} 
			

		}

		public static function total_search_results_found($con, $userLoggedInObj, $search_term)
		{


			$query = $con->prepare("SELECT * FROM cook WHERE tags LIKE CONCAT('%', :search_term, '%') OR title LIKE CONCAT('%', :search_term, '%') OR chef LIKE CONCAT('%', :search_term, '%') AND quantity != 0");
			$query->bindParam(":search_term",$search_term);
			$query->execute();

			$product = $query->rowCount();


			$query = $con->prepare("SELECT * FROM cook WHERE title LIKE CONCAT('%', :search_term, '%') AND quantity = 0");
			$query->bindParam(":search_term",$search_term);
			$query->execute();


			if ($query->rowCount() < 1) 
			{
				$product = $query->rowCount() - $product;
			}


			
				$query = $con->prepare("SELECT * FROM chef WHERE chef_name LIKE CONCAT('%', :search_term, '%')");
				$query->bindParam(":search_term",$search_term);
				$query->execute();

				$chef = $query->rowCount();

				$result = $product+$chef;

				if ($result <= 1) 
				{
					$result = $result ." result Found.";
				}
				else
				{
					$result = $result ."  results Found.";
				}


			return $result;

		}
	}	
 ?>