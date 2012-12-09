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
			<form />
		<div />
		<?php
			$query_string="SELECT * from STATUS_UPDATE where FRIENDS.userid = '".$userid['id']."' AND FRIENDS.friendsid = STATUS_UPDATE.userid;";
			$result=$db->query($query_string);
			echo "<p>".$result->num_rows."</p>";
		?>
		</div>
	</body>
</html>
