<?php 
class Countries
{
	private $con;
	public $country;

	public function __construct($con)
	{
		$this->con = $con;

	}

	public function countries()
	{
		$query = $this->con->prepare("SELECT * FROM countries");
		$query->execute();

		$html = "
		<select name='country' class='country' id='country'>
		<option value=''selected disabled>Select Country</option>

		";

		while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
		{
			$country_id = $row['id'];
			$country_name = $row['country'];
			$html .= "<option value='$country_id'>$country_name</option>";
		}

		$html .= "</select><br>";

		return $html;
	}

	// public static function country_id()
	// {
	// 	$query = $this->con->prepare("SELECT id FROM countries WHERE country = :country_name");
	// 	return $query->execute();
	// }	




}
 ?>
