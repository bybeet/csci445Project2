<?php
	require('header.php');
	
	$db = new mysqli(localhost, root, '', team06);
	$result = $db->query("SELECT id FROM USERS WHERE username = '".$_SESSION['user']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	$result = $db->query("SELECT friendid FROM FRIENDS WHERE userid = '".$userid['id']."';");
	
?>
	<h2>Friend List</h2>
	<table cellpadding="5">
		<tr>
		<th>Username</th>
		<th></th>
		</tr>
		<?php
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			$newResult = $db->query("SELECT * FROM USERS WHERE id = '".$row['friendid']."';");
			$friend = $newResult->fetch_array(MYSQLI_ASSOC);
?>
			<tr>
			<td><?php echo $friend['username']; ?></td>
			<td><input type="submit" value="No functionality here!"/></td>
			</tr>
<?php
		}
?>
		</table>
<?php
	
	$result->free();
	$db->close();
?>
