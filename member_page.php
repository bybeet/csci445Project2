<?php

	require('header.php');
	require('database.php');

	$result = $db->query("SELECT * FROM USERS");
	
?>
		<h2>Member Page</h2>
<?php
		?>
		<table cellpadding="5">
		<tr>
		<th>Email</th>
		<th></th>
		</tr>
		<?php
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			if($row['email'] == $_SESSION['email']){
				continue;
			}
			?>
				<form action="add_friend.php" method="post">
				<tr>
				<td><?php echo $row["email"]; ?></td>
				<input name="new_friend_email" value="<?= $row['email']; ?>" type="hidden"/>
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


