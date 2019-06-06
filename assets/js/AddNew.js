function newCountry()
{
	if ($("#addCountry").val() == "") 
	{
		alert("You can add your country over here,but we are not responsible if you can't sell your product...Recommended share it with yourfriends and family...")
		 
		$(".red").html("Please add a country");
		setTimeout(function() { $(".red").html(""); }, 2000);//timer to remove message
		return false;
	}
	else
	{

		alert("You can add your country over here,but we are not responsible if you can't sell your product...Recommended share it with yourfriends and family...")
		var countryName = $("#addCountry").val().toLowerCase(); 
		countryName = countryName.substr(0,1).toUpperCase()+countryName.substr(1);


		$.ajax({
			url: '../homecook/ajax/uploadToDatabase.php',
			type: 'POST',
			dataType: 'text',
			data: {countryName:countryName},
		})
		.done(function(data) {
			console.log("success");
			 $("#addCountry").val("");
			 $(".green").html(data);
			 setTimeout(function() { $(".green").html(""); }, 2000);//timer to remove message
// displaying new country name from ajax
				 $.ajax({
				  	url: '../homecook/ajax/getCountry.php',
				  	type: 'POST',
				  	dataType: 'text',
				  })
				  .done(function(data) {
				  	console.log("success");
				  	$("#country").html(data)
				  })
				  .fail(function(data) {
				  	console.log("error");
				  	alert(data)
				  })
				  .always(function() {
				  	console.log("complete");
				  });
//till here				  
		})
		.fail(function(data) {
			console.log("error");
			$(".red").html("Failed");
			$("#addCountry").val("");
			setTimeout(function() { $(".red").html(""); }, 5000);//timer to remove message
		})
		.always(function() {
			console.log("complete");
		});

		
	}
}


function newCity()
{
	if ($("#addCity").val() == "") 
	{
		$(".red").html("Please add a city");
		setTimeout(function() { $(".red").html(""); }, 2000);//timer to remove message
		return false;
	}
	else
	{
		var cityName = $("#addCity").val().toLowerCase(); 
		cityName = cityName.substr(0,1).toUpperCase()+cityName.substr(1);

		 var country_id = $("#country").val();

		 $.ajax({
			url: '../homecook/ajax/uploadToDatabase.php',
			type: 'POST',
			dataType: 'text',
			data: {country_id:country_id, city_name:cityName},
		})
		.done(function(data) {
			console.log("success");
			 $("#addCity").val("");
			 $(".green").html(data);
			 setTimeout(function() { $(".green").html(""); }, 2000);//timer to remove message
// displaying new city name from ajax
				 $.ajax({
				  	url: '../homecook/getCityFromCountry.php',
				  	type: 'POST',
				  	dataType: 'text',
					data: {country_id:country_id},
				  })
				  .done(function(data) {
				  	console.log("success");
				  	$("#city").html(data)
				  })
				  .fail(function(data) {
				  	console.log("error");
				  	alert(data)
				  })
				  .always(function() {
				  	console.log("complete");
				  });
//till here				  
		})
		.fail(function(data) {
			console.log("error");
			$(".red").html("Failed");
			$("#addCountry").val("");
			setTimeout(function() { $(".red").html(""); }, 5000);//timer to remove message
		})
		.always(function() {
			console.log("complete");
		});
	}
}