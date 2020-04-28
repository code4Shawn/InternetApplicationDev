<?php
	include_once 'DBConnector.php';
	include_once 'user.php';

	$con = new DBConnector;
	if (isset($_POST['btn-login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$instance = user::create();
		$instance->setPassword($password);
		$instance->setUsername($username);

		if ($instance->isPasswordCorrect()) {
			$instance->login();
			$con->closeDatabase();
			$instance->createUserSession();
		}else{
			$con->closeDatabase();
			header("Location:login.php");
		}
	}
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>LOGIN</title>
			<script type="text/javascript" src="validate.js"></script>
			<link rel="stylesheet" type="text/css" href="validate.css">
		</head>
		<body>
			<form method="POST" name="login" id="login" action="<?=$_SERVER['PHP_SELF']?>">
				<table>
					<tr>
						<td><input type="text" name="username" placeholder="Username" required></td>
					</tr>
					<tr>
						<td><input type="password" name="password" placeholder="Password" required></td>
					</tr>
					<tr>
						<td><button type="submit" name="btn-login"><strong>LOGIN</strong></button></td>
					</tr>
				</table>
			</form>
		</body>
	</html>