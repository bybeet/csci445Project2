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
			<p>Incorrect information, account not created.</p>
		</div>
		<div>
			<a href="create.php">Return to User Creation</a>
		</div>
	</body>
</html>
