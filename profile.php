<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();
	// Check to see if the user is logged in. This should be on most of your pages.
	/*if(isset($_SESSION['user'])){
		header("Location: profile.php");
	}*/
?>
<!DOCTYPE html>
<html>
	<head>
	<head>
		<title>Not Facebook</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	</head>
	<body>
		<div>
			<a href="profile_logout.php">Logout?</a>
		</div>
		<div>
			<p>No content yet. Sorry!</p>
		</div>
	</body>
</html>