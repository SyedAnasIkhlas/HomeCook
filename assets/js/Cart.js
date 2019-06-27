	function deleteFromCart()
	{
		if (!$("input[name='delete']:checked").val()) 
		{
		   alert('Nothing is checked!');
		}
		else 
		{


			var product_id = $("input[name='delete']:checked").val();


				$.ajax({
					url: 'ajax/deleteFromDatabase.php',
					type: 'POST',
					dataType: 'text',
					data: {product_id: product_id},
				})
				.done(function(data) {

					//alert(data);
					$('#cart-items').html("");
					$('#cart-items').html(data);

						$.ajax({
							url: 'ajax/deleteFromDatabase.php',
							type: 'POST',
							dataType: 'text',
							data: {cart: 'cart'},

							
						})
						.done(function(cart) {

							$('#price-value').html("");
							$('#price-value').html(cart);
						})
					

				})
				.fail(function() {
					console.log("error");
				})
			}
		



		
		
		
	}


	function updateCart()
	{
		if (!$("input[name='delete']:checked").val()) 
		{
		   alert('Please select the product you want to update!');
		}
		else 
		{

			var product_id = $("input[name='delete']:checked").val();
			var inputValue = $("#"+product_id).val();
			
			

			$.ajax({
				url: 'ajax/updateCart.php',
				type: 'POST',
				dataType: 'text',
				data: {product_id: product_id, inputValue: inputValue},
			})
			.done(function(data) 
			{
				alert(data)
				$('#price-value').html("");
				$('#price-value').html(data);
			})

			
		}
	}

	function orderConformation()
	{
		$.ajax({
				url: 'ajax/deleteFromDatabase.php',
				type: 'POST',
				dataType: 'text',
				data: {cart: 'cart'},

				
			})
			.done(function(cart) {

				alert('You total order cost '+cart+"SR");
				window.location.href='payment';
			})
	}