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

			$this->userData = $query->fetch(PDO::FETCH_ASSOC);
		}


		public static function isLoggedIn()
		{
			return isset($_SESSION["chef_name"]);
		}

		public function getUserId() 
		{
	        return $this->userData["id"];
	    }

	    public function getUsername() 
		{
	        return $this->userData["chef_name"];
	    }

	    public function getEmail() 
		{
	        return $this->userData["email"];
	    } 

	    public function getPhoneNo() 
		{
	        return $this->userData["phone_number"];
	    }

	    public function getRecQuestion() 
		{
	        return $this->userData["recovery_question"];
	    }

	    public function getRecEmail() 
		{
	        return $this->userData["recovery_email"];
	    }

	    public function getRecAnswer() 
		{
	        return $this->userData["recovery_answer"];
	    }

	    public function getProfilePic() 
		{
	        return $this->userData["user_picture"];
	    }

	    public function getUserIpAddress() 
		{
	        return $this->userData["ip_address"];
	    }

	    public function getSignUpDate() 
		{
	        return $this->userData["date_signup"];
	    }

	}


 ?>