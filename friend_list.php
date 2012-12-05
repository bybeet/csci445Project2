<?php
	require('header.php');
	
	$db = new mysqli(localhost, root, '', team06);
	$result = $db->query("SELECT * FROM USERS");
?>

