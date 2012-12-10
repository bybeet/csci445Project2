<?php
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	//require('header.php');
	require('database.php');

	$result = $db->query("INSERT INTO REQUESTS (userid, requesterid, resolved) VALUES ('{$_POST['new_friend_id']}', '{$_SESSION['id']}', 0);");
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