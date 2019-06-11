<?php 
	require_once 'includes/common/header.php';
	require_once 'includes/classes/InputFields.php';
	require_once 'includes/classes/ButtonProvider.php';
	require_once 'includes/classes/UploadImage.php';
	require_once 'includes/connection/config.php';
	require_once 'includes/classes/Countries.php';
	require_once 'includes/classes/City.php';
	require_once 'getCityFromCountry.php';
	require_once 'includes/classes/Modal.php';

	// Checking if user is already logged in
		if (isset($_SESSION['chef_name'])) 
		{
			header("location: kitchen?ASU=You are already Signed Up");
		}

	//****
	//Add new country from modal
	//

	$image = "<img src='https://img.icons8.com/ios/50/000000/plus-2-math-filled.png'>";

	$country_body = InputField::createInputField("text", "Country Name", "new_country", null, null, null,"addCountry", null)
	."<span class='red'></span>
	  <span class='green'></span>";


	$add_new_country = Modal::createModal(null, $image, "New Country", $country_body,"Add","data_target", "country","newCountry()");


	//
	//Add new city Modal
	//
	
		$city_body = InputField::createInputField("text", "City Name", "new_city", null, null, null,"addCity", null)
	."<span class='red'></span>
	  <span class='green'></span>";

	  $add_new_city = Modal::createModal(null, $image, "New City", $city_body,"Add","data_targe", "city","newCity()");
 ?>
	
	<div class="center-content signup">
		<div class="form-head">
			<button id="back">
				<img src="assets/icons/back-arrow.png">
			</button>

			<a href="index"><img src="assets/icons/brand-logo.png"></a>
		</div>

		<div class="form-body">

			<span class="sign">Sign up</span>
				<span class="main-error"></span>
				<form action="" method="POST" id="form">
				<input type="text" placeholder="Chef Name" value="<?php $name; ?>" name="username" required><br>
				<span id="user-message"></span>

				<input type="email" placeholder="Email" value="<?php $email; ?>" name="email" required><br>
				<span id="email-message"></span>
				
				<span class="inline_content pass">
					<input type="password" placeholder="Password" id="password" value="" name="password" required>
					<span id="password-length"></span>
				</span>

				<input type="password" placeholder="Password Confirm" id="confirmPassword" value="" name="" required><br>
				<span id="password-message"></span>

				<span class="inline_content signup-dropdown "> 

				 <select name="country" class="country" id='country' required>
				 	<option value="" selected disabled>Select Country</option>
				 </select>

				 	<?php 
				 		echo $add_new_country;	
				 	 ?>
				</span> 	 
				<!-- Displaying city name from country -->
				
				<span class="inline_content signup-dropdown ">
					<select name='city' class='city' id="city" required>
						<option value=''selected disabled>Select City</option>
					</select>
					<?php 
					 echo $add_new_city;
					 ?>
				</span>	 

				<input type="number" placeholder="Phone Number" id="phone_number" value="<?php $phone_number; ?>" name="phone_number" required><br>
				<span id="phone_number_message"></span>


				<input type="email" placeholder="Recovery Email" value="<?php $recovery_email; ?>" name="recovery_email" required><br>
				<span id="recovery_email-message"></span>

				<input type="text" placeholder="Recovery Question" value="<?php $question; ?>" name="question" required><br>
				<span id="recovery_question-message"></span>

				<input type="text" placeholder="Answer" value="<?php $answer; ?>" name="answer" required><br>
				<span id="recovery_answer"></span>

				

				<input type="submit" name="signup" value="New Kitchen" class="btn-green" id="signButton">
				<a href="signIn" class="a sign">SignIn</a>


			</form>
		</div>
		
	</div>



 <?php 
	require_once 'includes/common/footer.php';
 ?>