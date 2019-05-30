$(document).ready(function() 
{
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
  

	
});