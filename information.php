<?php
	require('header.php');	
	require('database.php');
	
	
	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	$userNum=$userid['id'];
	
	$userEmail=$_SESSION['email'];
	$userFirst=$userid['firstname'];
	$userLast=$userid['lastname'];
	$userName=$userid['username'];
	$userPassword=$userid['password'];
?>
		<h2>Update Information</h2>
		<div>
			<form id="information_form" method="post" action="changeInformation.php">
				<label for="information_name">Username:</label>
				<input type="text" id="information_name" name="information_name" value=<?php echo "$userName" ?> />
				<br />
				<label for="information_first">First name:</label>
				<input type="text" id="information_first" name="information_first" value=<?php echo "$userFirst" ?> />
				<br />
				<label for="information_first">Last name:</label>
				<input type="text" id="information_last" name="information_last" value=<?php echo "$userLast" ?> />
				<br />
				<label for="information_email">Email:</label>
				<input type="text" id="information_email" name="information_email" value=<?php echo "$userEmail" ?> />
				<br />
				<label for="information_password">Password:</label>
				<input type="password" id="information_password" name="information_password" value=<?php echo "$userPassword" ?> />
				<br />
				<label for="information_password_confirm">Please confirm:</label>
				<input type="password" id="information_password_confirm" name="information_password_confirm" value=<?php echo "$userPassword" ?> />
				<br />
				<input type="submit" />
			</form>
		</div>	
	</body>
</html>