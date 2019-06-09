$(document).ready(function()
{
	$('#back').click(function()
	{
		parent.history.back();
		return false;
	});

	$("#password").keyup(function()
	{
		var password = $("#password").val();

             if (password.length <= 5) 
             {
         		 $("#password-length").html("😟").css("color","red");
             }
             else
             {
                 $("#password-length").html("😎").css("color","green");

            }

            if ($("#confirmPassword").val() == "" ) 
            {
            	$("#password-message").html("");
            }
            else
            {

	             if ($("#confirmPassword").val() != $("#password").val()) 
	             {
	                 $("#password-message").html("Password do not match").css("color","red");
	             }
	             else
	             {
	                 $("#password-message").html("Password matched").css("color","green");
	             }
         	}

      });

	$("#confirmPassword").keyup(function()
	{
             if ($("#password").val() != $("#confirmPassword").val()) 
             {
                 $("#password-message").html("Password do not match").css("color","red");
             }
             else
             {
                 $("#password-message").html("Password matched").css("color","green");
             }
      });

	// checking phone number
	
		$("#phone_number").keyup(function() 
		{
		    var phoneNumber = document.getElementById("phone_number").value;
		    var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
		    if (filter.test(phoneNumber)) 
		    {
		        // alert("valid");
		    }
		    else 
		    {
		        // alert("not valid");
		    }
		})

		//submitting form through ajax
		
		
			 $(function () 
			 {

		        $('#form').on('submit', function (e) 
		        {

		          e.preventDefault();
			
			          $.ajax({
			          	url: '../../homecook/ajax/userSign.php',
			          	type: 'POST',
			          	dataType: 'text',
			          	data: $('form').serialize(),
			          })
			          .done(function(data) 
			          {
			          	var emailUse = "Email already in use";

			          	if (data == "user") 
			          	{
			          		$("#user-message").html("Sorry Chef another chef is using the same name...").css({
			          			color: 'red'});
			          		$("#signButton").removeClass('btn-green');
			          		$("#signButton").addClass('btn-red');

			          	}
			          	else
			          	{
			          		$("#user-message").html("");
			          	}


			          	if (data == emailUse) 
			          	{
			          		$("#email-message").html("Email already in use...").css({
			          			color: 'red'});

			          		$("#signButton").removeClass('btn-green');
			          		$("#signButton").addClass('btn-red');
			          	}
			          	else
			          	{
			          		$("#email-message").html("");
			          	}

			          	if (data == "phone") 
			          	{
			          		$("#phone_number_message").html("Can't use one phone number more than one time").css({
			          			color: 'red'});
			          		$("#signButton").removeClass('btn-green');
			          		$("#signButton").addClass('btn-red');

			          	}
			          	else
			          	{
			          		$("#phone_number_message").html("");
			          	}


			          	if (data == "error") 
			          	{
			          		$(".main-error").html("Can't sign up, Please try again...").css({
			          			color: 'red'});
			          		$("#signButton").removeClass('btn-green');
			          		$("#signButton").addClass('btn-red');
			          		

			          	}
			          	else
			          	{
			          		$(".main-error").html("");
			          	}

			          	

			          	if (data == "newuser") 
			          	{
			          		window.location.href ="signIn?newSignUp=Sign In Here";
			          	}

			          })
			          .fail(function() 
			          {
			          	alert("There were some errors...")
			          })
			          .always(function() 
			          {
			          	
			          });



		        });

		      });


			  $(function () 
			 {

		        $('#signInForm').on('submit', function (e) 
		        {

		          e.preventDefault();
			
			          $.ajax({
			          	url: '../../homecook/ajax/userSignIn',
			          	type: 'POST',
			          	dataType: 'text',
			          	data: $('form').serialize(),
			          })
			          .done(function(data) 
			          {
			          	alert(data);

			          })
			          .fail(function() 
			          {
			          	alert("There were some errors...")
			          })
			          .always(function() 
			          {
			          	
			          });



		        });

		      });
			
		


});