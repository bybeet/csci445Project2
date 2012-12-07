<?php
	session_start();
	
	if($_POST['login_username'] == "" || $_POST['login_password'] == ""){
		header("Location: incorrect_user.php");
	}else{
		$username = strip_tags($_POST['login_username']);
		$password = strip_tags($_POST['login_password']);
		@ $db = new mysqli(localhost, root, '', team06);
		$result = $db->query("SELECT * FROM USERS WHERE username = '{$username}' AND password = '{$password}'");
		//var_dump($result);
		//$count = $reult->num_rows;

		if ($result->num_rows == 1) {
			$user = $result->fetch_assoc();
			$_SESSION['logged_on'] = true;
			$_SESSION['user'] = $username;
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
