function newCountry()
{
	if ($("#addCountry").val() == "") 
	{
		$(".red").html("Please add a country");
		return false;
	}
	else
	{
		var countryName = $("#addCountry").val(); 
		alert(countryName);

		$.ajax({
			url: '../homecook/ajax/uploadToDatabase.php',
			type: 'POST',
			dataType: 'text',
			data: {countryName:countryName},
		})
		.done(function(data) {
			console.log("success");
			 $("#addCountry").val();
			 $("#country").html();
			 $(".green").html(data);

			 $.ajax({
  	url: '../homecook/ajax/getCountry.php',
  	type: 'POST',
  	dataType: 'text',
  })
  .done(function(data) {
  	console.log("success");
  	$("#country").html(data)
  	alert("pass")
  })
  .fail(function(data) {
  	console.log("error");
  	alert(data)
  })
  .always(function() {
  	console.log("complete");
  });
		})
		.fail(function(data) {
			console.log("error");
			$(".red").html("Failed");
		})
		.always(function() {
			console.log("complete");
		});

		
	}
}

			
// function refreshCountry()
// {
// 	$.ajax({
// 			url: '../homecook/ajax/uploadToDatabase.php',
// 			type: 'POST',
// 			dataType: 'text',
// 			data: {refreshCountry:'refreshCountry'},
// 		})
// 		.done(function(data) {
// 			console.log("success");
// 			//$("#country").html(data);
// 			$("#country").html(data);
			 
// 		})
// 		.fail(function(data) {
// 			console.log("error");
			
// 		})
// 		.always(function() {
// 			console.log("complete");
// 		});
// }





	



