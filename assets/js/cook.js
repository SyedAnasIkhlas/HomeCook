function cookIt()
{

	alert("cooked");

	$.ajax({
		url: '../../homecook/ajax/cooking.php',
		type: 'POST',
		dataType: 'text',
		data: new FormData(this),
	})
	.done(function(data) {
		console.log("success");
		alert(data)
	})
	.fail(function() {
		console.log("error");
		alert("failed")
	})
	.always(function() {
		console.log("complete");
	});
	
}