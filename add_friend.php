<?php

	require('header.php');
	require('database.php');
	
	$result = $db->query("SELECT id FROM USERS WHERE id = '".$_SESSION['id']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);

	$result = $db->query("INSERT INTO FRIENDS (userid, friendid) VALUES ('{$userid['id']}', '{$_POST['new_friend_id']}');");
	if($_POST['return_page'] === "friend_list.php"){
		header('Location: friend_list.php');
	}
	else{
		header('Location: member_page.php');
	}
	exit;

?>