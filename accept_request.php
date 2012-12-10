<?php

	require('header.php');
	require('database.php');

	$result = $db->query("INSERT INTO FRIENDS (userid, friendid) VALUES ('{$_POST['accept_friend_id']}', '{$_SESSION['id']}');");
        $result = $db->query("INSERT INTO FRIENDS (userid, friendid) VALUES ('{$_SESSION['id']}', '{$_POST['accept_friend_id']}');");
        $result = $db->query("UPDATE REQUESTS SET resolved = 1 where requesterid = '{$_POST['accept_friend_id']}' and userid = '{$_SESSION['id']}';");
	if($_POST['return_page'] === "friend_list.php"){
		header('Location: friend_list.php');
	}
	else{
		header('Location: friend_search.php');
	}
	exit;

?>