<?php
	session_start();

	if (!$_SESSION['logged_on']) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<div>
		You logged in!
	</div>
	<a href="profile.php">Profile!</a>
	
</body>
</html>
