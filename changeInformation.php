<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	
	require('database.php');
	$userName=$_POST['information_name'];
	$userFirst=$_POST['information_first'];
	$userLast=$_POST['information_last'];
	$userEmail=$_POST['information_email'];
	$userPassword=$_POST['information_password'];
	$userConfirm=$_POST['information_password_confirm'];
	
	$result = $db->query("SELECT * FROM USERS WHERE email = '".$_SESSION['email']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	
	$emailModified=false;
	$newPasswordMatch=false;
	
	if($userConfirm != $userPassword){
		echo "<p>Passwords do not match. Please return to information page.</p>";
		echo "<a href=\"information.php\">Information Page</a>";
		exit;
	}
	
	$userCurrentEmail=$_SESSION['email'];
	$userCurrentFirst=$userid['firstname'];
	$userCurrentLast=$userid['lastname'];
	$userCurrentName=$userid['username'];
	$userCurrentPassword=$userid['password'];
	
	if($userEmail != $userCurrentEmail){
		$userCurrentEmail=$userEmail;
		$emailModified=true;
	}
	if($userName != $userCurrentName){
		$userCurrentName=$userName;
	}
	if($userFirst != $userCurrentFirst){
		$userCurrentFirst=$userFirst;
	}
	if($userLast != $userCurrentLast){
		$userCurrentLast=$userLast;
	}
	if($userPassword != $userCurrentPassword && $userPassword != ""){
		$userCurrentPassword=$userPassword;
	}
	$email=$_SESSION['email'];
	
	$query="UPDATE USERS SET firstname='$userCurrentFirst', lastname='$userCurrentLast', username='$userCurrentName', email='$userCurrentEmail', password='$userCurrentPassword' WHERE email='$email';";
	$result=$db->query($query);

	if($emailModified){
		session_destroy();
		session_start();
		$_SESSION['logged_on'] = true;
		$_SESSION['email']=$userCurrentEmail;
	}
	
	header("Location: profile.php");
?>