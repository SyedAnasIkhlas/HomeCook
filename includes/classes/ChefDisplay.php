<?php 
	class ChefDisplay
	{
		private $con, $chef_id, $userLoggedIn, $chef_data;

		public function __construct($con, $userLoggedIn, $chef_id)
		{
			$this->$con = $con;
			$this->$userLoggedIn = $userLoggedIn;
			$this->$chef_id = $chef_id;

			$query = $this->con->prepare("SELECT * FROM chef WHERE id = :chef_id");
			$query->bindParam(":chef_id",$chef_id);
			$query->execute();

			$this->chef_data = $query->fetch(PDO::FETCH_ASSOC);
		}


		public function create()
		{
			return"
					<div class='main-chef-display' >
	
						<div class='chef-country' title='country_name'>
							<span class='chef-country-name-text'>
								<a href='search?c_id=country_id'>pak</a>
							</span>
							
						</div>
					
						<div class='chef-data-container'>

							<a class='chef-name' href='kitchen?chef_id=chef_id' title='Chef Name'>
									<span class='chef-anme-title'>
										chef name here
									</span>
								</a>
					
							
					
							<a class='chef-image' href='kitchen?chef_id=chef_id' title='Chef Image'>
								<img src='../images/userImage/defaultUserPicture/dafault1.png' alt='imageSrc'>	
							</a>			
								<div class='follow-chef' title='Follow Chef' onclick='followChef(this, chef_id)'>
									<span id='followText'>Follow Chef</span>
									<img src='assets/icons/table-white.png' class='follow_icon'>
								</div>
					
							<div class='view-kitchen' title='visit kitchen '>
								<a class='view-kitchen-a' href='kitchen?chef_id=chef_id' >
									<span class='default-chef'>
										Visit
									</span>
									<span class='kitchen'>
										Kitchen
									</span>
									
								</a>
							</div>	
						</div>

						<div class='chef-star-indicator' title='$quantityVal in Stock'>
							<span class='star-indicater-text'>
								5.0
							</span>
						</div>

					</div>";

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



		
		



	}

 ?>