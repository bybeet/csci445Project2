<?php
	require('header.php');
	require('database.php');
	
	$result = $db->query("SELECT id FROM USERS WHERE id = '".$_SESSION['id']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	$result = $db->query("SELECT requesterid FROM REQUESTS WHERE userid = '".$userid['id']."' and resolved = 0;");
	
?>
	<h2>Friend Requests</h2>
	<table cellpadding="5">
		<tr>
		<th>Requests</th>
		<th></th>
		<th></th>
		</tr>
		<?php
		//Iterate through all rows returned by the database query.
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			$newResult = $db->query("SELECT * FROM USERS WHERE id = '".$row['requesterid']."';");
			$friend = $newResult->fetch_array(MYSQLI_ASSOC);
?>

			<tr>
				<td><?php echo $friend['firstname']." ".$friend['lastname']; ?></td>
                        <form method="post" action="accept_request.php">
				<input name="accept_friend_id" value="<?= $friend['id']; ?>" type="hidden"/>
				<td><input type="submit" value="Accept <?php echo $friend['firstname']; ?>"/></td>
			</form>
			<form method="post" action="reject_request.php">
				<input name="reject_friend_id" value="<?= $friend['id']; ?>" type="hidden"/>
				<td><input type="submit" value="Reject <?php echo $friend['firstname']; ?>"/></td>
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
