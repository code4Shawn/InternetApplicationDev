$(document).ready(function(){
	$('#btn-place-order').click(function(event){
		event.preventDefault();

		//receive all variables

		var name_of_food = $('#name_of_food').val();
		var number_of_units = $('#number_of_units').val();
		var unit_price = $('#unit_price').val();
		var order_status = $('#status').val();

		//remember you will communicate with the API if you have the API key
		//You go to the API system and generate your API key
		//we now build a http post request and we send it using ajax

		$.ajax((
			url: "http//localhost/lab/api/v1/orders/index.php",// this is the url to our resource
			type: "post",
			data: {name_of_food:name_of_food, number_of_units, unit_price, order_status:order_status},
			headers:{
				'Authorization': 'Basic qo9zHm7QeV3C1RAfSjCjTA3ijfsBhgb6P4dcBJcljlOhWwA1E4fYbK71YGMa'
			},

			success: function(data){
				alert(data['message']);
			},

			error: function(){
				alert("An error occured");
			}
		}
	});
});
