<?php  
	require_once ('../homecook/require_once/header_required_files.php');
?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<!-- NavIcon -->
		<link rel='shortcut icon' href='https://img.icons8.com/ios/50/000000/chef-hat.png'>
		<title>HomeCooks</title>
	<!--ALL CSS STYLE SHEETS-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../homecook/assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="../homecook/assets/css/header.css">
		<link rel="stylesheet" type="text/css" href="../homecook/assets/css/searchbar-and-cart.css">
		<link rel="stylesheet" type="text/css" href="../homecook/assets/css/uploadPage.css">
		<link rel="stylesheet" type="text/css" href="../homecook/assets/css/sign.css">
		<link rel="stylesheet" type="text/css" href="../homecook/assets/css/product-display.css">
		<link rel="stylesheet" type="text/css" href="../homecook/assets/css/shortcut.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		


		

	</head>
	<body>
		<nav>

			<div class="togglearea">
				<span class="sp-brand">
					<div class="mobile-brand"><a href="../homecook/index">HomeCook</a><span class="typed-cursor typed-cursor--blink">|</span></div>
				</span>
				<span class="menu">
					<label for="toggle">
						<span>&#9776;</span>
					</label>
				</span>
			</div>
			<input type="checkbox" id="toggle">
			<div class="navbar">
				<div  class="nav_list">

					<div class="mobile_serach">
						<form class="form-inline my-2 my-lg-0" action="../homecook/search" method="get">
					    
					      <input  type="search" placeholder="Search" aria-label="Search">
					      <button class="btn searchButton" type="submit">
							<img src="https://img.icons8.com/ios/50/000000/search-filled.png">
					      </button>
					    
				   	 	</form>

					</div>
					
					<a href="#">Home</a>
					<a href="#">Sell</a>
					<a href="#">Buy</a>
					<a href="#">About</a>
					<span class="dropdown">
						<span class="dropdown-button">
							<a href="#">More</a>
						</span>
						<ul>
							<li>hello</li>
							<li>hello</li>
							<li>bye</li>
						</ul>

					</span>
					
					

				</div>	
					<div class="brand"><a  href="../homecook/index" class="no_style">HomeCook</a><span class="typed-cursor typed-cursor--blink">|</span></div>

					<div class="searchBox">	
					 <form class="form-inline my-2 my-lg-0" action="../homecook/search" method="get">
					    
					      <input  type="search" placeholder="Search" aria-label="Search">
					      <button class="btn searchButton" type="submit">
							<img src="https://img.icons8.com/ios/50/000000/search-filled.png">
					      </button>
					    
				    </form>
				    </div> 
			</div>
		</nav>

		<span class="language">
			
		</span>

			<?php 
			 echo SearchBarAndCartProvider::create($con, $userLoggedInObj);
			?>

		<main>
			<section class='content-section'>

				<div class="ads">
					
				</div>

		<div class="content">
	 
			




