<?php 
	class Review
	{
		public static function addNewReview($userLoggedInObj)
		{
			if ($userLoggedInObj->isLoggedIn() == "") 
			{
				return "
				<div class='sign-in-to-review'>
					<button>
						<a href='signIn'>
							Sign In
						</a>
					</button>
					<span>Sign In to review</span>
				</div>";
			}
			else
			{

				$user_id = $userLoggedInObj->getUserId();
				$username = $userLoggedInObj->getUsername();
				$user_picture = $userLoggedInObj->getProfilePic();

				return"
				<div class='review-section'>
				    <div class='comment-section'>

				        <div class='user-info'>
				         <div class='user-image'>
				            <img src='$user_picture' alt=''>
				        </div>

				        <div class='username-comment'>
				            <span>$username</span>
				        </div>      

				        </div>

				        <div class='input-position'>
				        <div class='review-topic'>
				            <input type='text' name='topic' class='topic' placeholder='Title'>
				        </div>

				        <div class='review-description'>
				            <textarea name='description' id='review-description' placeholder='Reviews'></textarea> 
				        </div>
				        </div> 

				        <div class='add-review-button'>
				            <button onclick='addReview($user_id)'>Add Review</button>
				        </div>

				  
				    </div>

				      <div class='rating-area'>
				        <div class='stars'>
				            <div class='rating'>
				                <span><input type='radio' name='rating' id='str5' value='5'><label for='str5'></label></span>
				                <span><input type='radio' name='rating' id='str4' value='4'><label for='str4'></label></span>
				                <span><input type='radio' name='rating' id='str3' value='3'><label for='str3'></label></span>
				                <span><input type='radio' name='rating' id='str2' value='2'><label for='str2'></label></span>
				                <span><input type='radio' name='rating' id='str1' value='1'><label for='str1'></label></span>
				            </div>
				        </div>

				    </div>
				        
				</div>";
			}

			
		}





	}

 ?>

 <!-- <div class='review-section'>
     
   
    <div class='comment-section'>

        <div class='user-info'>
         <div class='user-image'>
            <img src='images/userImage/defaultUserPicture/dafault1.png' alt=''>
        </div>

        <div class='username-comment'>
            <span>$username</span>
        </div>      

        </div>

        <div class='input-position'>
        <div class='review-topic'>
            <input type='text' name='topic' class='topic' placeholder='Title'>
        </div>

        <div class='review-description'>
            <textarea name='description' id='review-description' placeholder='Reviews'></textarea> 
        </div>
        </div> 

        <div class='add-review-button'>
            <button onclick='addReview($user_id)'>Add Review</button>
        </div>

  
    </div>

      <div class='rating-area'>
        <div class='stars'>
            <div class='rating'>
                <span><input type='radio' name='rating' id='str5' value='5'><label for='str5'></label></span>
                <span><input type='radio' name='rating' id='str4' value='4'><label for='str4'></label></span>
                <span><input type='radio' name='rating' id='str3' value='3'><label for='str3'></label></span>
                <span><input type='radio' name='rating' id='str2' value='2'><label for='str2'></label></span>
                <span><input type='radio' name='rating' id='str1' value='1'><label for='str1'></label></span>
            </div>
        </div>

    </div>
        
 </div> -->