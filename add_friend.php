<?php

	require('header.php');

	@ $db = new mysqli(localhost, root, '', team06);
	
	$result = $db->query("SELECT id FROM USERS WHERE username = '".$_SESSION['user']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);

	$result = $db->query("SELECT * FROM USERS WHERE username = '".$_POST['new_friend_username']."';");
	$friendid = $result->fetch_array(MYSQLI_ASSOC);
	
	$result = $db->query("SELECT * FROM FRIENDS WHERE userid = '".$userid['id']."' and friendid = '".$friendid['id']."';");
	if( $result->num_rows == 1 ){
?>
		<p><?= $_POST['new_friend_username']; ?> is already your friend.</p>
<?php
	}
	else{
		$result = $db->query("INSERT INTO FRIENDS (userid, friendid) VALUES ('{$userid['id']}', '{$friendid['id']}');");
?>
		<h2>Add a Friend</h2>
		<p><?= $_POST['new_friend_username']; ?> added as a friend.</p>
	</body>
</html>
<?php
	}
	$result->free();
	$db->close();
?>
