-
 <?php 
	
	require_once 'GetIpAddress.php';

	class SearchBarAndCartProvider
	{
		
		public static function create($con, $userLoggedInObj)
		{
			$user = $userLoggedInObj->isLoggedIn();

			if ($user == "") 
			{
				$ip_address = GetIpAddress::get_ip_address();
				$query = $con->prepare("SELECT count(*) FROM `visiter_table` WHERE ip_address = :ip_address");
				$query->bindParam(":ip_address",$ip_address);
				$query->execute();

				$total_numbers = $query->fetch(PDO::FETCH_NUM);
				$total_number = $total_numbers[0];

			}
			else
			{
				$user_id = $userLoggedInObj->getUserId();
				$query = $con->prepare("SELECT * FROM `customer_table` WHERE user_id = :user_id");
				$query->bindParam(":user_id",$user_id);
				$query->execute();

				$total_number = $query->rowCount();


			}

			if ($total_number > 1) 
			{
				$total_number = 0 ;
			}


			return"
			<div class='search-bar-cart' title='Search Here'>
				<div class='search-area'>
					<form action='search' method='GET'>
						<input type='text' placeholder='Search' name='search_query' class='search-box'>

						<button type='submit' name='search' class='search-button'>
							<img src='assets/icons/spoon-white.png'>
						</button>
					</form>
				</div>
	
				<div class='icon-wrapper' title='Items Dinning Table'>
					<div class='cart-area'>
						<div class='cart'>
						  <a href='cart'> <i class='icon-grey'><img src='assets/icons/plate-white.png' class='cart-image'></i></a>
						   <span class='badge'>$<q{1: cite='*'}></q></span>
						</div>
					</div>
				</div> 

				<!-- <div class='cart-area'>
					<div class='cart'>
						<img src='assets/icons/plate-white.png' class='cart-image'>
						<div class='total-items'>$total_number</div>
					</div>

				</div> -->
			</div>";
		}
	}


 ?>