<?php
	session_start();
	
	require('database.php');
	
	$firstname = strip_tags($_POST['registration_first_name']);
	$lastname = strip_tags($_POST['registration_last_name']);
	$age = strip_tags($_POST['registration_age']);
	$gender = strip_tags($_POST['registration_gender']);
	$email = strip_tags($_POST['registration_email']);
	$password = strip_tags($_POST['registration_password']);
	$passwordconfirm = strip_tags($_POST['registration_password_confirm']);

	$target = "images/";
	$target = $target . $email;

	if($password === $passwordconfirm){
	//todo: need to validate the information

		$result = $db->query("SELECT email FROM USERS where email = '".$email."';");
		if($result->num_rows > 0) {
			//If the email address is already in use, set email to in_use, call the incorrect create page.
			$_POST['registration_email'] = "in_use";
			header("Location: incorrect_create.php");
			exit;
		}

		$result = $db->query("INSERT INTO USERS (firstname, lastname, email, password, age, gender, image) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$password}', '{$age}', '{$gender}', '{$target}');");
		
		echo "<h1>Account Successfully Created!</h1>";

		if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
		{
			//Tells you if its all ok
			echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory";
		}
		else {
			//Gives and error if its not
			echo "Sorry, there was a problem uploading your file.";
		}

		?>
		<p>
		<a href="index.php">Return to main screen and login.</a>
	</p>
	<?php
	}else{
		//If the passwords do not match, set the post registration_password to incorrect and loaded the incorrect create page.
		$_POST['registration_password'] = "incorrect";
		header("Location: incorrect_create.php");
	}
?>
