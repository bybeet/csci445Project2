<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();
	// Check to see if the user is logged in. This should be on most of your pages.
	/*if(isset($_SESSION['user'])){
		header("Location: profile.php");
	}*/
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
	</head>
	<body>
		<div>
			<h1>The Not Facebook</h1>
		</div>
		<div>
			<a href="home.php">Home</a>
			<br />
			<a href="profile.php">Your Profile</a>
			<br />
			<a href="friend_list.php">Friend List</a>
			<br />
			<a href="member_page.php">Member Page</a>
			<br />
			<a href="profile_logout.php">Logout of Not Facebook</a>
		</div>
