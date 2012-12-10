<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Not Facebook</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="style/header.css" type="text/css" />
	</head>
	<body>
		<div class="header">
			<h1>The Not Facebook</h1>
		</div>
		<div class="header">
			<a href="home.php">Home</a>
			<br />
			<a href="profile.php">Your Profile</a>
			<br />
			<a href="friend_list.php">Friend List</a>
                        <br />
			<a href="friend_requests.php">Friend Requests</a>
			<br />
			<a href="friend_search.php">Friend Search</a>
			<br />
			<a href="profile_logout.php">Logout of Not Facebook</a>
		</div>
