<?php

	require('header.php');
	require('database.php');
	
	$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);

	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_POST['new_friend_email']."';");
	$friendid = $result->fetch_array(MYSQLI_ASSOC);

	$result = $db->query("INSERT INTO FRIENDS (userid, friendid) VALUES ('{$userid['id']}', '{$friendid['id']}');");
	header('Location: member_page.php');
	exit;

?>