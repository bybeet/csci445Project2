<?php
	session_start();
	
	@ $db = new mysqli(localhost, root, '', team06);
	$firstname = strip_tags($_POST['registration_first_name']);
	$lastname = strip_tags($_POST['registration_last_name']);
	$username = strip_tags($_POST['registration_user_name']);
	$email = strip_tags($_POST['registration_email']);
	$password = strip_tags($_POST['registration_password']);
	$passwordconfirm = strip_tags($_POST['registration_password_confirm']);
	if($password === $passwordconfirm){
	//todo: need to validate the information
		$result = $db->query("INSERT INTO USERS (firstname, lastname, username, email, password) VALUES ('{$firstname}', '{$lastname}', '{$username}', '{$email}', '{$password}');");
		?>
		<a href="index.php">Return to main screen and login.</a>
	<?php
	}else{
		header("Location: incorrect_create.php");
	}
?>
