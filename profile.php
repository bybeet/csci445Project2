<?php
	require('header.php');
	require('database.php');
	
	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
	$result = $result->fetch_array(MYSQLI_ASSOC);
?>
		<h2>Profile - <?php echo $_SESSION['email']; ?></h2>
		<img src="<?= $result['image']; ?>" alt="<?= $result['firstname']." ".$result['lastname']; ?> Profile Picture">
		<h3>Status Updates</h3>
	</body>
</html>
