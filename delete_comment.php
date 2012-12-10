<?php
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	//Delete the comment identified by the id in $_POST and return to previous page.
	//require('header.php');
	require('database.php');

	$commentId = $_POST['comment_id'];
	$db_query = "DELETE FROM STATUS_COMMENTS where id = $commentId";
	$result = $db->query($db_query);

	$returnPage = $_POST['return_page'];
	header("Location: $returnPage");
	exit;
?>