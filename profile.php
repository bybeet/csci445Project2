<?php
	require('header.php');
	require('database.php');

	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
	$result = $result->fetch_array(MYSQLI_ASSOC);
?>
		<h2>Profile - <?php echo $_SESSION['email']; ?></h2>
		<img src="<?= $result['image']; ?>" alt="<?= $result['firstname']." ".$result['lastname']; ?> Profile Picture">
		<h3>Status Updates</h3>
		<div>
			<form id="status_form" method="post" action="statusUpdate.php">
				<label for="status_text">Status:</label>
				<input type="text" id="status_text" name="status_text" />
				<br />
				<input type="submit" value="Submit" />
			</form>
		</div>
		<?php
			$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
			$userid = $result->fetch_array(MYSQLI_ASSOC);
			$userNum=$userid['id'];
			$query_string="SELECT DISTINCT STATUS_UPDATES.* FROM FRIENDS, STATUS_UPDATES WHERE FRIENDS.userid =  '$userNum' AND STATUS_UPDATES.userid = FRIENDS.friendid OR STATUS_UPDATES.userid = '$userNum'";
			$friends=$db->query($query_string);
			$rows=$friends->num_rows;
			for($i=0; $i<$rows; $i++){
				$currentRow=$friends->fetch_assoc();
				$currentUserNum=$currentRow['userid'];
				$userDbData=$db->query("SELECT * FROM USERS WHERE id = '$currentUserNum'");
				$userData=$userDbData->fetch_assoc();
				$userFirstName=$userData['firstname'];
				$userLastName=$userData['lastname'];
				$status=$currentRow['status_update'];
				echo "<h4>$userFirstName $userLastName said:</h4>";
				echo "<p>$status</p>";
			}
		?>
	</body>
</html>
