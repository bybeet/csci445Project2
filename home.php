<?php
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	
	header('header.php');
	
?>

	<div>
		<p><?php echo $_SESSION['user']; ?>, you logged in!</p>
	</div>

</body>
</html>
