function addToTable(product_id)
{
	$.ajax({
		url: 'ajax/addToCart.php',
		type: 'POST',
		data: {product_id: product_id},
		dataType: 'text',
		
	})
	.done(function(data) {
		alert(data);
		$(".badge").html(data); 	
	})
	.fail(function(data) {
		alert(data);
	})

	
}