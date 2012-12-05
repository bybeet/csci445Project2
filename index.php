<?php
	session_start();
	
	if(isset($_SESSION['user'])){
		header("Location: profile.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Not Facebook</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	</head>
	<body>
		<div>
			<h1>Welcome to NFb!</h1>
			<h2>The Not Facebook</h2>
		</div>
		<div>
			<h2>Current User Login</h2>
			<form id="login_form" method="post" action="user_login.php">
				<label for="login_username">Username:</label>
				<input type="text" id="login_username" name="login_username" />
				<br />
				<label for="login_password">Password:</label>
				<input type="password" id="login_password" name="login_password" />
				<br />
				<input type="submit" value="Submit" />
			</form>
		</div>
		<div>
			<a href="create.php">Create New User!</a>
		</div>
	</body>
</html>