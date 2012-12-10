<?
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}

	require('database.php');

	$status_id = $_POST['status_id'];
	$result = $db->query("DELETE FROM STATUS_UPDATES WHERE id='".$status_id."';");
	header('Location: profile.php');
	exit;
?>
