<?php 
	
	require_once 'Cart.php';
	

	class SearchBarAndCartProvider
	{
		
		public static function create($con, $userLoggedInObj)
		{
			$total_number = Cart::totalItemsInCart($con, $userLoggedInObj);

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
						   <span class='badge'>$total_number<q{1: cite='*'}></q></span>
						</div>
					</div>
				</div> 
			</div>";
		}
	}


 ?>