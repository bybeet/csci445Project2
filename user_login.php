<?php
	session_start();
	
	if($_POST['login_username'] == "" || $_POST['login_password'] == ""){
		header("Location: incorrect_user.php");
	}
	else{
		//TODO: check username in the database
		$_SESSION['user']=$_POST['username'];
		header("Location: profile.php");
	}
?>