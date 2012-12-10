<?php
	require('header.php');
	require('database.php');
	
	$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	$result = $db->query("SELECT friendid FROM FRIENDS WHERE userid = '".$userid['id']."';");
	
?>
	<h2>Friend List</h2>
	<table cellpadding="5">
		<tr>
		<th>Friends</th>
		<th></th>
		<th></th>
		</tr>
		<?php
		//Iterate through all rows returned by the database query.
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			$newResult = $db->query("SELECT * FROM USERS WHERE id = '".$row['friendid']."';");
			$friend = $newResult->fetch_array(MYSQLI_ASSOC);
?>

			<tr>
				<td><?php echo $friend['firstname']." ".$friend['lastname']; ?></td>
				<form method="get" action="profile.php">
					<input name="friend_email" value="<?= $friend['email']; ?>" type="hidden"/>
				<td>
					<input type="submit" value="View Profile"/>
				</td>
			</form>
			<form method="post" action="delete_friend.php">
				
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
