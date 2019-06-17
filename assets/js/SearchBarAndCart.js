function addToTable(product_id)
{
	$.ajax({
		url: 'ajax/addToCart.php',
		type: 'POST',
		dataType: 'text',
		data: {product_id: product_id},
	})
	.done(function(data) {
		alert(data);
		$(".badge").html(data
)	})
	.fail(function(data) {
		alert(data);
	})
	.always(function() {
		console.log("complete");
	});
	
}