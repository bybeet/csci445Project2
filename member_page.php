<?php

	require('header.php');
	require('database.php');

	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userData = $result->fetch_array(MYSQLI_ASSOC);
	$result = $db->query("SELECT * FROM USERS");
	
?>
		<h2>Member Page</h2>

		<table cellpadding="5">
		<tr>
		<th>Name</th>
		<th>Email</th>
		<th></th>
		</tr>
		<?php
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			if($row['email'] == $_SESSION['email']){
				continue;
			}
			?>
				<tr>
				<td><?= $row['firstname']." ".$row['lastname']; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<?php
					//Check to see if the member is already a friend of the user.
					//If they are, then change the button text and logic to take them to that
					//member's profile page.
					$alreadyFriend = $db->query("SELECT * FROM FRIENDS where userid = '".$userData['id']."' and friendid ='".$row['id']."';");
					if($alreadyFriend->num_rows == 0){
				?>
					<form action="add_friend.php" method="post">
						<input name="new_friend_id" value="<?= $row['id']; ?>" type="hidden"/>
						<td>
							<input type="submit" value="Add as a friend"/>
							<input name="return_page" value="member_list.php" type="hidden"/>
						</td>
					</form>
				<?php
					}
					else{
				?>
				<form action="profile.php" method="get">
					<input name="friend_email" value="<?= $row['email']; ?>" type="hidden"/>
					<td>
						<input type="submit" value="View friend profile"/>
					</td>
				</form>
			<?php
				}
			?>
				</tr>
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


