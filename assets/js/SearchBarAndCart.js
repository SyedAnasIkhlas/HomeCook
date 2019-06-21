
function addToTable( button, product_id)
{
	 event.stopPropagation();
    event.stopImmediatePropagation();
    var currentClass = $(button).attr('class');

	$.ajax({
		url: 'ajax/addToCart.php',
		type: 'POST',
		data: {product_id: product_id},
		dataType: 'text'
	})
	.done(function(data) {
		//turning json data from ajax to 
		var data = JSON.parse(data); 

		// alert out of stock
		var stockMessage = data.stock;
		if (stockMessage) 
		{
			alert(stockMessage);
		}

		// //cart
		// var cart = data.cart;
		// var cartValue = $(".badge").val();
		// cart += cartValue


		
		

		 

		//add to table button
		var buttonClass = data.buttonClass;
		var buttonText = data.buttonText;
		var buttonTitle = $(button).attr('title');

		var currentClass = $(button).attr('class');

		// $(button).toggleClass(buttonClass);

		if (buttonClass == "add-to-table red") 
		{		
			$(button).removeClass("blue").addClass('red');
			$(button).prop({title:"Remove From Table"});

			// $(button).hover(function() 
			// {
  	// 			$(this).css("background-color","#fff")
			// });
			 $(button).children('#tableText').text(buttonText);
		}
		else
		{
			$(button).removeClass("red").addClass('blue');
			$(button).children('#tableText').text(buttonText);			
		}	
			


		// updating quantity
		//  var updatedQuantity = data.quantity+" in stock";
		//  $(button).siblings(".stock-indicater").prop({title: quantity});


		//end first ajax
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

	//start of 2 ajax
		
			$.ajax({
				url: 'ajax/addToCart.php',
				type: 'POST',
				data: {cart: "cart"},
				dataType: 'text',
			})
			.done(function(totalitems) 
			{
				if (totalitems < 0) 
				{
					totalitems = 0;
				}

				$(".badge").html(totalitems);
				console.log(totalitems)
			});
			//end of 2 ajax
			
			//3 ajax start
			$.ajax({
				url: 'ajax/addToCart.php',
				type: 'POST',
				data: {quantity: product_id},
				dataType: 'text',
			})
			.done(function(quantity) 
			{
				if (quantity == 0) 
				{
					$(".stock-indicater").removeClass('green').addClass("red");
				}
				$(button).siblings("stock-indicater").prop({title: quantity});
				alert(quantity);
			});
			
			//3 ajax end
			





}