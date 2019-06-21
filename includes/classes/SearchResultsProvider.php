<?php 
	class SearchResultsProvider
	{
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

			if ($query->rowCount() > 1) 
			{
				$result = $query->rowCount()." results found";
			}
			else
			{
				$result = $query->rowCount()." result found";
			}

			

				while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
			{
				$cook_id = $row["id"];
				$product = ProductDisplay::product_display($con, $cook_id, $userLoggedInObj);
				$product_data = array('product' => $product, 'result' => $result); 
				return $product_data;

		 	} 

		}
	}	
 ?>