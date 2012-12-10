<?php
	session_start();
	
	require('database.php');
	
	if($_POST['login_email'] == "" || $_POST['login_password'] == ""){
		header("Location: incorrect_user.php");
	}else{
		$email = strip_tags($_POST['login_email']);
		$password = strip_tags($_POST['login_password']);
		$result = $db->query("SELECT * FROM USERS WHERE email = '{$email}' AND password = '{$password}'");
                $userArr = $result->fetch_array(MYSQLI_ASSOC);
		//var_dump($result);

		if ($result->num_rows == 1) {
			//$user = $result->fetch_assoc();
			$_SESSION['logged_on'] = true;
			$_SESSION['id'] = $userArr['id'];
			header("Location: home.php");
			exit;
		}
		else {
			$_SESSION['logged_on'] = false;
			$_SESSION['failure'] = "Failed to log in";
			header("Location: incorrect_user.php");	
		}
		//$db->close();
	}
?>