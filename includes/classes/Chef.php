<?php 
class Chef{

		private $con, $chef_id, $userLoggedInObj, $chef_data,$rowCount;

		public function __construct($con, $userLoggedInObj, $chef_id)
		{
			$this->con = $con;
			$this->userLoggedInObj = $userLoggedInObj;
			$this->chef_id = $chef_id;

			$query = $this->con->prepare("SELECT * FROM chef WHERE id = :chef_id");
			$query->bindParam(":chef_id",$chef_id);
			$query->execute();

			$this->rowCount = $query->rowCount();

			$this->chef_data = $query->fetch(PDO::FETCH_ASSOC);
		}


		public function chefExisit()
		{
			return $this->rowCount;
		}

		public function getChefId()
		{
			return $this->chef_data['id'];
		}

		public function getChefName()
		{
			return $this->chef_data['chef_name'];
		}

		public function getChefEmail()
		{
			return $this->chef_data['email'];
		}

		public function getChefPicture()
		{
			return $this->chef_data['user_picture'];
		}

		public function getChefSignUpDate()
		{
			return $this->chef_data['date_signup'];
		}

		public function getChefCity()
		{
			return $this->chef_data['city'];
		}

		public function getChefNationality()
		{
			return $this->chef_data["country"];
		}
} ?>