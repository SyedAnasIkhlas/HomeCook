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
		<?php require_once 'require_once/header_css_files.php'; ?>
		


		

	</head>
	<body>
		<nav>
			<header>
				<div class='user-panel without-search'>
					<div class="user-panel-left">
						<span class="user-country-name">Saudi Arabia</span>
						<span class='cash-on-delivery-message-toolpit' title='Pay cash on your door steps.'>Cash on Delivery</span>
					</div>

					<div class="user-panel-center">
						<div class="logo">
							<a href="../homecook"><img src="https://img.icons8.com/ios/50/000000/chef-hat.png" alt="HomeCook"></a>
						</div>
					</div>

					<div class="user-panel-right">
						<?php 
							if (!isset($_SESSION['chef_name'])) 
							{
							?>
								<a href="../homecook/SellOnHomecook/SellOnHomecook">Cook on HomeCook</a>
						<?php
							}
							else
							{
								?>
								<a href="../homecook/cook">Let's Cook</a>
						<?php
								
							}
						 ?>
						
						

						<a href="../homecook/help/help">Help</a>

							


						<?php 
							if (!isset($_SESSION['chef_name'])) 
							{
						?>
								<div class="sign-user">
							<span><a href="../homecook/signIn">Login</a></span>
							<span class="border-line">|</span>
							<span><a href="../homecook/signUp">Register</a></span>
								</div>

						<?php
							}
							else
							{
						 ?>
						 	<div class="sign-user">
								<span><a href="../homecook/logout">Logout</a></span>
							</div>	

						 <?php 
							}
						  ?>

						

						
					</div>
				</div>
				<div class='search-bar-cart visible'>

				</div>
			</header>

			
		</nav>	

		<main>
			<section class='main-content-section'>

		<div class="main-content">
	 
			




