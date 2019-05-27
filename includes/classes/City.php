<?php 

	class City
	{

		private $con, $country_id;

		public function __construct($con, $country_id)
		{
			$this->con = $con;
			$this->country_id = $country_id;
		}

		public function city()
		{
				$output = "";
			
				$query = $this->con->prepare("SELECT * FROM city WHERE country_id = :country_id  ORDER BY city ASC");
				$query->bindParam(":country_id", $this->country_id);
				$query->execute();

				$output .= "<option value=''selected disabled>Select City</option>";
	
				while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
				{
					$city_id = $row['id'];
					$city = $row['city'];
					$output .="<option value='$city_id'>$city</option>";
				}
				return $output;	
		}
	}

 ?>