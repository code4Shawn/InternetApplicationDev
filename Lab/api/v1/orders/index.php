<?php

include_once 'apiHandler.php';
include_once 'DBConnector';

$api = new ApiHandler();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$api_key_correct = false;
	$headers = apache_request_headers();
	$header_api_key = $headers['Authorization'];
	$api->setUserApiKey($header_api_key);
	$api_key_correct = $api->checkApiKey();

	if ($api_key_correct) {

		//we are creating an order

		$name_of_food = $_POST['name_of_food'];
		$number_of_units = $_POST['number_of_units'];
		$unit_price = $_POST['unit_price'];
		$order_status = $_POST['order_status'];

		//connect to the database
		$con = new DBConnector();

		//use setters and getters to assign values

		$api->setMealName($name_of_food);
		$api->setmealUnits($number_of_units);
		$api->setUnitPrice($unit_price);
		$api->setstatus($order_status);
		$res = $api->createOrder();

		if ($res) {

			//create json and respond

			$response_array = ['success' => 1, 'message' => 'Order has been placed'];
			header('Content-type: application/jason');
		}

		else{
			$response_array = ['success' => 0, 'message' => 'Wrong API key'];
			header('Content-type: application/json');
			echo json_encode($response_array);
		}
	else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

		//for retrieving order status
	}

	else{

		//sorry we are not supporting this for now
	}
	
	}
}


?>