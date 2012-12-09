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
			<form id="registration_form" method="post" action="user_create.php" enctype="multipart/form-data">
				<label for="registration_first_name">First Name:
				<input type="text" id="registration_first_name"  name="registration_first_name"/>
				</label>
				<br />
				<label for="registration_last_name">Last Name:
				<input type="text" id="registration_last_name" name="registration_last_name"/>
				</label>
				<br />
				<label for="registration_email">Email Address:
				<input type="text" id="registration_email" name="registration_email"/>
				</label>
				<br />
				<label for="registration_age">Age:
				<input type="text" id="registration_age" name="registration_age"/>
				</label>
				<label for="registration_gender">Gender:
				<select name="registration_gender">
				<option value="male" selected>Male</option>
				<option value="female">Female</option>
				</select>
				<br />
				<label for="registration_password">Password:
				<input type="password" id="registration_password" name="registration_password"/>
				</label>
				<br />
				<label for="registration_password_confirm">Re-enter Password:
				<input type="password" id="registration_password_confirm" name="registration_password_confirm"/>
				</label>
				<br />
				<label for="photo">User Picture:
				<input type="file" id="photo" accept="image/*" name="photo"/>
				</label>
				<br />
				<input type="submit" value="Submit" />
			</form>
		</div>
		<form method="link" action="index.php">
		<input type="submit" value="Cancel"/>
		</form>
	</body>
</html>
