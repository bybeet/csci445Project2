<?php

	require('header.php');
	require('database.php');

	$statusid = $_POST['statusid'];
	$comment = $_POST['comment_text'];

	$db_query = "SELECT * FROM USERS WHERE id = '".$_SESSION['id']."';";
	$result = $db->query($db_query);
	$result = $result->fetch_array(MYSQLI_ASSOC);

	$userid = $result['id'];

	$db_query = "INSERT INTO STATUS_COMMENTS (statusid, userid, comment) values ('{$statusid}', '{$userid}', '{$comment}');";
	$result = $db->query($db_query);

	$returnPage = $_POST['return_page'];
	header("Location: $returnPage");
?>