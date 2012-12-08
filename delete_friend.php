<?php
	require('header.php');
	require('database.php');
	
	$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);

	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_POST['delete_friend_email']."';");
	$friendid = $result->fetch_array(MYSQLI_ASSOC);
	
	$result = $db->query("DELETE FROM FRIENDS where userid = '{$userid['id']}' and friendid = '{$friendid['id']}';");
?>

	<h2>Remove Friend</h2>
		<p><?= $_POST['delete_friend_email']; ?> removed from friend list.</p>
	</body>
</html>

<?php
	$db->close();
?>
