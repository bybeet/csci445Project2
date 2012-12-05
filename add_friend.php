<?php

	require('header.php');

	@ $db = new mysqli(localhost, root, '', team06);
	
	$result = $db->query("SELECT * FROM USERS WHERE username = $_SESSION['user']");
	$temp = $results->fetch_array();
	$userid = $temp['id'];
	var_dump($userid);
	/*
	$result = $db->query("SELECT * FROM USERS WHERE username = $_POST['new_friend_username']");
	$temp = $results->fetch_array();
	$friendid = $temp['id'];
	
	$result = $db->query("INSERT INTO FRIENDS (userid, friendid) VALUES ('{$suerid}', '{$friendid}');");
	
	$result->free();
	$db->close();
	*/
	
?>

<h2>Add a Friend</h2>
<p><?= $_POST['new_friend_username']; ?> added as a friend.</p>

</body>
</html>
