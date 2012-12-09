<?php
	require('header.php');
	require('database.php');
	$status_update=$_POST['status_text'];
	$result=$db->query("INSERT INTO STATUS_UPDATES (userid, status_update) VALUES ('{$userid['id']}', '{$status_update}');");
	header("Location: profile.php");
?>
