<?php 
	class ChefDisplay
	{

		public static function create($chef_id,$chef_name, $image)
		{
			return"
					<div class='main-chef-display' >
	
						<div class='chef-country' title='country_name'>
							<span class='chef-country-name-text'>
								<a href='search?c_id=country_id'>pak</a>
							</span>
							
						</div>
					
						<div class='chef-data-container'>

							<a class='chef-name' href='kitchen?chef_id=$chef_id' title='Chef Name'>
									<span class='chef-name-title'>
										$chef_name
									</span>
								</a>
					
							
					
							<a class='chef-image' href='kitchen?chef_id=$chef_id' title='Chef Image'>
								<img src='$image' alt='$chef_name'>	
							</a>			
								<div class='follow-chef' title='Follow Chef' onclick='followChef(this, $chef_id)'>
									<span id='followText'>Follow Chef</span>
									<img src='assets/icons/table-white.png' class='follow_icon'>
								</div>
					
							<div class='view-kitchen' title='visit kitchen '>
								<a class='view-kitchen-a' href='kitchen?chef_id=$chef_id' >
									<span class='default-chef'>
										Visit
									</span>
									<span class='kitchen'>
										Kitchen
									</span>
									
								</a>
							</div>	
						</div>

						<div class='chef-star-indicator' title='5 stars'>
							<span class='star-indicater-text'>
								5.0
							</span>
						</div>

					</div>";

		}





		
		



	}

 ?>