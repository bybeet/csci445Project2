<?php
	require('header.php');
	require('database.php');

	$commentId = $_POST['comment_id'];
	$db_query = "DELETE FROM STATUS_COMMENTS where id = $commentId";
	$result = $db->query($db_query);

	$returnPage = $_POST['return_page'];
	header("Location: $returnPage");
	exit;
?>