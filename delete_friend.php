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
		<form method="post" action="add_friend.php">
			<input name="new_friend_email" value="<?= $_POST['delete_friend_email']; ?>" type="hidden"/>
			<input type="submit" value="Undo"/>
		</form>
		<form method="get" action="friend_list.php">
			<input type="submit" value="Okay"/>
		</form>
	</body>
</html>

<?php
	$db->close();
?>
