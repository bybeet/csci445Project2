<?php
	session_start();
	
	if($_POST['login_username'] == "" || $_POST['login_password'] == ""){
		header("Location: incorrect_user.php");
	}
	else{
		//TODO: check username in the database
		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		@ $db = new mysqli(localhost, root, '', team06);
		$result = $db->query("SELECT * FROM USERS WHERE username = '{$username}' AND PASSWORD = '{$password}'");
		$count = mysqli_num_rows($result);

		if ($count != 0) {
			$user = $result->fetch_assoc();
			$_SESSION['logged_on'] = true;

			header("Location: home.php");
		}
		else {
			$_SESSION['logged_on'] = false;
			$_SESSION['failure'] = "Failed to log in";
			header("Location: incorrect_user.php");	
		}
		$db->close();
	}
?>