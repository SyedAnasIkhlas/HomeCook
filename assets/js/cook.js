function cookIt()
{
	form = $("#cook")

	var data = new FormData();
	data.append('cook',form)
	alert("cooked");

	$.ajax({
		url: '../../homecook/ajax/cooking.php',
		type: 'POST',
		dataType: 'text',
		data: data,
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