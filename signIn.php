<?php
	require_once 'includes/common/header.php';
	require_once 'includes/classes/InputFields.php';
	require_once 'includes/classes/ButtonProvider.php';
	require_once 'includes/connection/config.php';

	

	if (isset($_SESSION['chef_name'])) 
	{
		header("location: kitchen?ASI=You are already Signed In");
	}


if (isset($_GET['newSignUp'])) 
{
	$newSignUp =  $_GET['newSignUp'];
}
else
{
	$newSignUp = "";
}
 ?>

 <div class="center-content">
		<div class="form-head">
			<button id="back">
				<img src="assets/icons/back-arrow.png">
			</button>

			<a href="index"><img src="assets/icons/brand-logo.png"></a>
		</div>

		<div class="form-body">

			<span class="sign">Sign In</span>
				<span class="main-error"><?php echo $newSignUp; ?></span>

			<form action="" method="POST" id="signInForm">

				<input type="text" placeholder="Email/Chef Name/Phone Number" value="<?php $name; ?>" name="signInSource" required><br>
				<span id="user-message"></span>
				<input type="password" placeholder="Password" id="password" value="" name="password" required>
				<input type="submit" name="signin" value="Cook Something" class="btn-green">
				<a href="signUp" class="a sign">SignUp</a>


			</form>
		</div>
		
	</div>



 <?php 
	require_once 'includes/common/footer.php';
 ?>