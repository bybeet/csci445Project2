<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();
	// Check to see if the user is logged in. This should be on most of your pages.
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
			<h2>New User Registration</h2>
			<form id="registration_form">
				<label for="registration_first_name">First Name:
				<input type="text" id="registration_first_name" />
				</label>
				<br />
				<label for="registration_last_name">Last Name:
				<input type="text" id="registration_last_name" />
				</label>
				<br />
				<label for="registration_email">Email Address:
				<input type="text" id="registration_email" />
				</label>
				<br />
				<label for="registration_password">Password:
				<input type="password" id="registration_password" />
				</label>
				<br />
				<label for="registration_password_confirm">Re-enter Password:
				<input type="password" id="registration_password_confirm" />
				</label>
				<br />
				<label for="registration_image_file">User Picture:
				<input type="file" id="registration_image_file" />
				</label>
				<br />
				<input type="submit" value="Submit" />
			</form>
		</div>
	</body>
</html>
