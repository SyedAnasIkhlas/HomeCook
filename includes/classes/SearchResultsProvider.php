<?php 
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
					echo $chef_id = $row['id'];
				}
			}
			else
			{
				echo "no chef found";
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

			$query = $con->prepare("SELECT * FROM cook WHERE tags LIKE CONCAT('%', :search_term, '%') OR title LIKE CONCAT('%', :search_term, '%')");
			$query->bindParam(":search_term",$search_term);
			$query->execute();

			while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
			{
				$cook_id = $row["id"];
				$product = ProductDisplay::product_display($con, $cook_id, $userLoggedInObj);
				$product_data = array('product' => $product); 
				echo $product;

		 	} 

		}

		public static function total_search_results_found($con, $userLoggedInObj, $search_term)
		{


			$query = $con->prepare("SELECT * FROM cook WHERE tags LIKE CONCAT('%', :search_term, '%') OR title LIKE CONCAT('%', :search_term, '%')");
			$query->bindParam(":search_term",$search_term);
			$query->execute();

			if ($query->rowCount() > 1) 
			{
				$result = $query->rowCount()." results found";
			}
			else
			{
				$result = $query->rowCount()." result found";
			}

			return $result;

		}
	}	
 ?>