<?php
	session_start();
	
	@ $db = new mysqli(localhost, root, '', team06);
	$firstname = strip_tags($_POST['registration_first_name']);
	$lastname = strip_tags($_POST['registration_last_name']);
	//$username = strip_tags($_POST['registration_user_name']);
	$email = strip_tags($_POST['registration_email']);
	$password = strip_tags($_POST['registration_password']);
	$passwordconfirm = strip_tags($_POST['registration_password_confirm']);
	if($password === $passwordconfirm){
	//todo: need to validate the information
		$result = $db->query("SELECT email FROM USERS where email = '".$email."';");
		if($result->num_rows > 0) {
			//If the email address is already in use, set email to incorrect, call the incorrect create page.
			$_POST['registration_email'] = "incorrect";
			header("Location: incorrect_create.php");
			exit;
		}
		$result = $db->query("INSERT INTO USERS (firstname, lastname, email, password) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$password}');");
		?>
		<h1>Account Successfully Created!</h1>
		<a href="index.php">Return to main screen and login.</a>
	<?php
	}else{
		//If the passwords do not match, set the post registration_password to incorrect and loaded the incorrect create page.
		$_POST['registration_password'] = "incorrect";
		header("Location: incorrect_create.php");
	}
?>
