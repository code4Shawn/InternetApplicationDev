<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location:login.php");
	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>PRIVATE PAGE</title>
			<script type="text/javascript" src="validate.js"></script>
			<script type="text/javascript" src="apikey.js"></script>
			<link rel="stylesheet" type="text/css" href="validate.css">
			<!--bootsrap file-->
			<!--js--> 
			<script type="text/javascript" src="bootsrap/js/bootstrap.js"></script>
			<script type="text/javascript" src="bootsrap/js/bootstrap.min.js"></script>

			<!--css-->
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css.map">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css.map">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css.map">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css.map">
		</head>
		<body>
			<p align='right'><a href="loguot.php">Logout</a></p>
			<hr>
			<h3>Here we will create an API that will allow Users/Developers to order items from external systems </h3>
			<hr>
			<h4>We now put this feature of allowing users to generate an API key. click the buton to generate an API key.</h4>

			<button class="btn btn-primary" id="api-key-btn">Generate API key</button><br><br>

			<!--this text area will hold the API key-->
			<strong>Your API key:</strong> (NOTE that if your API key is already in use by running applications, generating a new API key will stop the application from functioning)<br>
			<textarea cols="100" rows="2" id="api_key" name="api_key" readonly=""><?php echo fetchUserApiKey();?></textarea>

			<h3>Service Description</h3>
			We have a service/API that allows external applications to order food and also put all order status by using order id. Let's do it.

			<hr>
			
		</body>
	</html>