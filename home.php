<?php
	require('header.php');	
	require('database.php');

	//Need to change so that the sql query goes from the most recently added row, then to the most recent row.
?>

	<div>
		<p><?php echo $_SESSION['email']; ?>, you logged in!</p>
	</div>
	<h2>Status Updates</h2>
	<?php
			$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
			$userid = $result->fetch_array(MYSQLI_ASSOC);
			$userNum=$userid['id'];
			$query_string="SELECT DISTINCT STATUS_UPDATES.* FROM FRIENDS, STATUS_UPDATES WHERE FRIENDS.userid =  '$userNum' AND STATUS_UPDATES.userid = FRIENDS.friendid OR STATUS_UPDATES.userid = '$userNum' ORDER BY id DESC";
			$friends=$db->query($query_string);
			$rows=$friends->num_rows;
			for($i=0; $i<20; $i++){
				$currentRow=$friends->fetch_assoc();
				if($currentRow == NULL){
					break;
				}
				
				$currentUserNum=$currentRow['userid'];
				$userDbData=$db->query("SELECT * FROM USERS WHERE id = '$currentUserNum'");
				$userData=$userDbData->fetch_assoc();
				
				$userFirstName=$userData['firstname'];
				$userLastName=$userData['lastname'];
				$updateTime = $currentRow['lastUpdated'];
				$status=$currentRow['status'];

				echo "<h4>At $updateTime $userFirstName $userLastName said:</h4>";
				echo "<p>$status</p>";
			}
		?>

</body>
</html>
