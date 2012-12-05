<?php

	require('header.php');
	
	$db = new mysqli(localhost, root, '', team06);
	$result = $db->query("SELECT * FROM USERS");
	
?>
		<h2>Member Page</h2>
<?php
		?>
		<table cellpadding="5">
		<tr>
		<th>Username</th>
		<th></th>
		</tr>
		<?php
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			if($row['username'] == $_SESSION['user']){
				continue;
			}
			?>
				<form action="add_friend.php" method="post">
				<tr>
				<td><?php echo $row["username"]; ?></td>
				<input name="new_friend_username" value="<?= $row['username']; ?>" type="hidden"/>
				<td><input type="submit" value="Add as a friend"/></td>
				</tr>
				</form>
			<?php
		}
		?>
		</table>
		<?php
	
	$result->free();
	$db->close();

?>
	</body>
</html>


