<?php
	require('header.php');	
	require('database.php');

	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userData = $result->fetch_array(MYSQLI_ASSOC);

?>

	<div>
		<p><?php echo $userData['firstname']; ?>, you're logged in!</p>
	</div>
	<h2>Status Updates</h2>
	<?php
			
			$userNum=$userData['id'];
			$query_string="SELECT DISTINCT STATUS_UPDATES.* FROM FRIENDS, STATUS_UPDATES WHERE FRIENDS.userid =  '$userNum' AND STATUS_UPDATES.userid = FRIENDS.friendid OR STATUS_UPDATES.userid = '$userNum' ORDER BY id DESC";
			$friends=$db->query($query_string);
			if($friends->num_rows == 0){
				echo "<p>Post a 
					<a href=\"profile.php\">status</a> or add a 
					<a href=\"member_page.php\">friend</a> to see
					status updates.</p>";
			}
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
				echo "<h3>$userFirstName $userLastName said:</h3>";
				echo "<p>$status<br />$updateTime</p>";
			}
		?>

</body>
</html>
