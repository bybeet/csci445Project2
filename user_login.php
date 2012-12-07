<?php
	session_start();
	
	if($_POST['login_email'] == "" || $_POST['login_password'] == ""){
		header("Location: incorrect_user.php");
	}else{
		$email = strip_tags($_POST['login_email']);
		$password = strip_tags($_POST['login_password']);
		@ $db = new mysqli(localhost, root, '', team06);
		$result = $db->query("SELECT * FROM USERS WHERE email = '{$email}' AND password = '{$password}'");

		if ($result->num_rows == 1) {
			$user = $result->fetch_assoc();
			$_SESSION['logged_on'] = true;
			$_SESSION['user'] = $email;
			header("Location: home.php");
		}
		else {
			$_SESSION['logged_on'] = false;
			$_SESSION['failure'] = "Failed to log in";
			//header("Location: incorrect_user.php");	
		}
		$db->close();
	}
?>
