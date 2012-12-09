<?php
	require('header.php');
	require('database.php');


	//This will need to be changed to enable users to view other users profiles.
	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
	$result = $result->fetch_array(MYSQLI_ASSOC);
?>
		<h2>Profile - <?php echo $_SESSION['email']; ?></h2>
		<img src="<?= $result['image']; ?>" alt="<?= $result['firstname']." ".$result['lastname']; ?> Profile Picture">
		<h3>Information</h3>
			<p>
				Name: <?= $result['firstname']." ".$result['lastname']; ?>
				<br />
				Email: <?= $result['email']; ?>
				<br />
				Age: 
			<?php 
				if( $result['age'] != NULL ){
					echo $result['age']; 
				}
				else{
					echo "Not given";
				}

			?>
			<br />
			Gender: <?= $result['gender']; ?>
			</p>
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
			$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
			$userData = $result->fetch_array(MYSQLI_ASSOC);
			$userNum = $userData['id'];
			//$query_string = "SELECT DISTINCT STATUS_UPDATES.* FROM FRIENDS, STATUS_UPDATES WHERE FRIENDS.userid =  '$userNum' AND STATUS_UPDATES.userid = FRIENDS.friendid OR STATUS_UPDATES.userid = '$userNum'";
			//$friends=$db->query($query_string);
			//$rows=$friends->num_rows;
			$query_string = "SELECT * from STATUS_UPDATES where userid = $userNum ORDER BY id DESC";
			$statusUpdates = $db->query($query_string);
			for($i=0; $i<5; $i++){
				$currentRow=$statusUpdates->fetch_assoc();
				if($currentRow == NULL){
					break;
				}
				
				$userFirstName= $userData['firstname'];
				$userLastName= $userData['lastname'];
				$updateTime = $currentRow['lastUpdated'];
				$status=$currentRow['status'];

				echo "<h3>$userFirstName $userLastName said:</h3>";
				echo "<p>$status<br />$updateTime</p>";
			}
		?>
	</body>
</html>
