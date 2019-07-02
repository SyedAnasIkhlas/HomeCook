<?php 

	require_once 'ProductDisplay.php';
	class CreateUserProfile
	{

		public function create($con, $userLoggedInObj,$chef)
		{
			$profile = new CreateUserProfile();
			$dishes = $profile->dishes_data($con, $userLoggedInObj,$chef);
			$chef_info = $profile->chefInfo($con, $userLoggedInObj,$chef);

			return 
			"
				$chef_info 

			<ul class='nav nav-pills mb-3' id='pills-tab' role='tablist'>
				  <li class='nav-item'>
				    <a class='nav-link' id='more-dishes-tab' data-toggle='pill' href='#more-dishes' role='tab' aria-controls='more-dishes' aria-selected='false'>Dishes</a>
				  </li>
				  <li class='nav-item'>
				    <a class='nav-link' id='review-tab' data-toggle='pill' href='#review' role='tab' aria-controls='review' aria-selected='false'>Reviews</a>
				  </li>

				  <li class='nav-item'>
				    <a class='nav-link' id='about-tab' data-toggle='pill' href='#about' role='tab' aria-controls='about' aria-selected='false'>About</a>
				  </li>
				</ul>





			<div class='tab-content' id='pills-tabContent'>
			  <div class='tab-pane fade' id='more-dishes' role='tabpanel' aria-labelledby='more-dishes-tab'>$dishes</div>
			  <div class='tab-pane fade' id='review' role='tabpanel' aria-labelledby='review-tab'>5 star</div>
			  <div class='tab-pane fade' id='about' role='tabpanel' aria-labelledby='about-tab'>about</div>
			</div>";

		}
		


		public function chefInfo($con, $userLoggedInObj,$chef)
		{
			$chef_picture = $chef->getChefPicture(); 
			$chef_name = $chef->getChefName();

			return 
			"
			<div class = 'picture-banner'>
				<div class='banner'>
					$chef_name
				</div>

				<div class='chef-profile-info'>

					<div class='chef-name-profile'>
						$chef_name
					</div>

					<div class='chef-picture'>
						<img src='$chef_picture' alt='$chef_name'>
					</div>

					

					<div class='followers-section'>
						<button class='button'>Follow Chef</button>
						<span>.</span>
						<div class='followers'>
						<span class='followers-count'>50</span>
						followers
					</div>
				</div>


				</div>
				

			</div>


			
				
			";
		}



		public function dishes_data($con, $userLoggedInObj,$chef)
		{
			$chef_name = $chef->getChefName();

			$query = $con->prepare("SELECT * FROM cook WHERE chef = :chef_name");
			$query->bindParam(":chef_name",$chef_name);
			$query->execute();
			

			

			while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
			{
				$cook_id = $row['id'];
				$product = ProductDisplay::product_display($con, $cook_id, $userLoggedInObj);
				return $product;	
			}
			
		}
	}


 ?>