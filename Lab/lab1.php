<!DOCTYPE html>
	<?php
		include_once 'DBConnector.php';
		include_once 'user.php';

		$con = new DBConnector;

		if (isset($_POST['btn-save'])) {

			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$city = $_POST['city_name'];

			$user = new User($first_name, $last_name, $city);

			if (!$user->validateForm()) {
				$user->createFormErrorSessions();
				header("Refresh:0");
				die();
			}

			$res = $user->save();

			if ($res) {

				echo "Operation is completed";
			}

			else {

				echo "Error occurred";
			}
		}
	?>
	<html>
		<head>
			<title>USER</title>
			<script type="text/javascript" src="validate.js"></script>
			<link rel="stylesheet" type="text/css" href="validate.css">
		</head>
		
		<body>
			<form method="POST" name="user_details" id="user_details" onsubmit="return validateForm()" action="<? =$_SERVER['PHP_SELF'] ?>">
				<table align="center">
					<tr>
						<td>
							<div id="form-errors">
								<?php
								session_start();
								if (!empty($_SESSION['form_errors'])) {
									echo " " .$_SESSION['form_errors'];
									unset($_SESSION['form_errors']);
								}
								?>
							</div>>
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
						<td><input type="text" name="username" placeholder="Username" required=""></td>
					</tr>
					<tr>
						<td><input type="password" name="password" placeholder="Password" required=""></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
					</tr>
					<tr>
						<td><a href="login.php">LOGIN</a></td>
					</tr>
				</table>
			</form>
		</body>
	</html>