<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();
	// Check to see if the user is logged in. This should be on most of your pages.
	/*if(isset($_SESSION['user'])){
		header("Location: profile.php");
	}*/
	require('header.php')
?>
	<h2>Profile</h2>
		<div>
			<p>No content yet. Sorry!</p>
		</div>
	</body>
</html>
