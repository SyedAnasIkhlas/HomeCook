<?php 
	require_once 'common/header.php';
	if (!isset($_GET['chef_id']))
	{
		echo " 
		 <div class='no-product-found-container'>
		 	<img src='https://img.icons8.com/ios/50/000000/error.png'>
		 	<span>Chef id is missing</span>
		 </div>";
	}
	else
	{
		$chef_id = $_GET['chef_id'];
		$chef = new Chef($con, $userLoggedInObj, $chef_id);
		$user = $chef->chefExisit();

		if ($user == 0) 
		{
			echo " 
			 <div class='no-product-found-container'>
			 	<img src='https://img.icons8.com/ios/50/000000/error.png'>
			 	<span>this account isn't available... it might be deleted</span>
			 </div>";
		}
		else
		{


			$chef_name = $chef->getChefName();
			$chef_picture = $chef->getChefPicture();
			$chef_name;
			$chef_picture;
	
			$user = new  CreateUserProfile();
			


		
 ?>	
 

 <div class="user-page-content">
	<?php echo $user->create($con, $userLoggedInObj,$chef); ?>
</div>	








 <?php 
	 	}
	 }

 require_once 'common/footer.php';
  ?>