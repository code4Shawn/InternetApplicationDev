<!DOCTYPE html>
	<?php
		include_once 'DBConnector.php';
		include_once 'user.php';
		$con = new DBConnector;
		if (isset($_POST['btn-save'])) {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$city = $_POST['city_name'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			$utcTime = $_POST['utcTime'];
			$offset = $_POST['offset'];

			//creating user object
			$user = new User($first_name, $last_name, $city, $username, $password, $utcTime, $offset);
			if (!$user->validateForm()) {
				$user->createFormErrorSessions();
				header("Refresh:0");
				die();
			}

			$res = $user->save();
			if ($res) {
				echo "Record Added Successfully";
			}else{
				echo "Error Adding Record";
			}
		}
	?>
	<html>
		<head>
			<title>SIGN UP</title>
			<script type="text/javascript" src="validate.js"></script>
			<link rel="stylesheet" type="text/css" href="validate.css">

			<!--include jquery here. get it from cnd network-->
			<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<!--your new js file comes after including your query-->
			<script type ="text/javascript" src ="timezone.js"></script>
		</head>
		
		<body>
			<form method="POST" name="user_details" id="user_details" onsubmit="return validateForm" action="<?=$_SERVER['PHP_SELF']?>">
				<table align="center">
					<tr>
						<td>
							<div id="form-errors">
								<?php
									session_start();
									if (!empty($_SESSION['form_errors'])) {
										echo " " . $_SESSION['form_errors'];
										unset($_SESSION['form_errors']);
									}
								?>
							</div>
						</td>
					</tr>
					<tr>
						<td><input type="text" name="first_name" required placeholder="First Name"></td>
					</tr>
					<tr>
						<td><input type="text" name="last_name" required placeholder="Last Name"></td>
					</tr>
					<tr>
						<td><input type="text" name="city_name" required placeholder="City"></td>
					</tr>
					<tr>
						<td><input type="text" name="username" required placeholder="Username"></td>
					</tr>
					<tr>
						<td><input type="password" name="password" required placeholder="password"></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
					</tr>

					<!--create hidden controls to store client utc date and time zone-->
					<input type ="hidden" name ="utcTime" id ="utcTime" value =""/>
					<input type ="hidden" name ="offset" id ="offset" value =""/>

					<tr>
						<td><a href="login.php">Login</a></td>
					</tr>
				</table>
			</form>
		</body>
	</html>