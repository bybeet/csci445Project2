<?php
	require('header.php');
	
	$db = new mysqli(localhost, root, '', team06);
	$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	$result = $db->query("SELECT friendid FROM FRIENDS WHERE userid = '".$userid['id']."';");
	
?>
	<h2>Friend List</h2>
	<table cellpadding="5">
		<tr>
		<th>Friends</th>
		<th></th>
		</tr>
		<?php
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			$newResult = $db->query("SELECT * FROM USERS WHERE id = '".$row['friendid']."';");
			$friend = $newResult->fetch_array(MYSQLI_ASSOC);
?>
			<tr>
			<form method="post" action="delete_friend.php">
				<td><?php echo $friend['firstname']." ".$friend['lastname']; ?></td>
				<input name="delete_friend_email" value="<?= $friend['email']; ?>" type="hidden"/>
				<td><input type="submit" value="Delete <?php echo $friend['firstname']; ?>"/></td>
			</form>
			</tr>
<?php
		}
?>
		</table>
<?php
	
	$result->free();
	$db->close();
?>
