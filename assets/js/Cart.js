	function updateCart()
	{
		var product_id = $("input[name='delete']:checked").val();
		
		$.ajax({
			url: 'ajax/deleteFromDatabase.php',
			type: 'POST',
			dataType: 'text',
			data: {product_id: 'product_id'},
		})
		.done(function(data) {
			alert(data)
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}