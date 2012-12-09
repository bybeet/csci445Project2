<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	require('database.php');
	$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	$status_update = $_POST['status_text'];
	$result = $db->query("INSERT INTO STATUS_UPDATES (userid, status) VALUES ('{$userid['id']}', '{$status_update}');");
	header('Location: profile.php');
	exit;
?>