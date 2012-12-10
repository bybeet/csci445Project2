<?php
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	//require('header.php');
	require('database.php');
	
	$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);

	$result = $db->query("INSERT INTO FRIENDS (userid, friendid) VALUES ('{$userid['id']}', '{$_POST['new_friend_id']}');");
	/*if($_POST['return_page'] === "friend_list.php"){
		header('Location: friend_list.php');
	}
	else{
		header('Location: member_page.php');
	}*/
	$returnPage = $_POST['return_page'];
	header("Location: $returnPage");
	exit;
?>