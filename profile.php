<?php
	require('header.php')
	
	$db = new mysqli(localhost, root, '', team06);
	$result = $db->query("SELECT id FROM USERS WHERE email = '".$_SESSION['email']."';");
	//$result = $result->result_array();
	var_dump($result);
?>
		<h2>Profile - <?php echo $_SESSION['email']; ?></h2>
		<!-- <img src="<?= $result['image']; ?>" alt="some_text"> -->
		<h3>Status Updates</h3>
	</body>
</html>
