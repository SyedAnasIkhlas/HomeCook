<?php 
	class User
	{
		private $con, $userData;

		public function __construct($con, $chef_name)
		{
			$this->con = $con;

			$query = $this->con->prepare("SELECT * FROM `chef` WHERE chef_name = :chef_name");
			$query->bindParam(":chef_name",$chef_name);
			$query->execute();

			$this->userDate = $query->fetch(PDO::FETCH_ASSOC);
		}


		public static function isLoggedIn()
		{
			return isset($_SESSION["chef_name"]);
		}


	}


 ?>