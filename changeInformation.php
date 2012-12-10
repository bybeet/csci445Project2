<?php
	// Begin the PHP session. This line must be on every page of your network for sessions to work!
	session_start();

	if ($_SESSION['logged_on'] == false) {
		header("Location: index.php");
		exit;
	}
	
	require('database.php');
	$userFirst=mysql_real_escape_string($_POST['information_first']);
	$userLast=mysql_real_escape_string($_POST['information_last']);
	$userEmail=mysql_real_escape_string($_POST['information_email']);
	$userPassword=mysql_real_escape_string($_POST['information_password']);
	$userConfirm=mysql_real_escape_string($_POST['information_password_confirm']);
        
	
	$result = $db->query("SELECT * FROM USERS WHERE id = '".$_SESSION['id']."';");
	$userid = $result->fetch_array(MYSQLI_ASSOC);
	$emailModified=false;
	$newPasswordMatch=false;
        $sessionid = $_SESSION['id'];
	
	if($userConfirm != $userPassword){
		echo "<p>Passwords do not match. Please return to information page.</p>";
		echo "<a href=\"information.php\">Information Page</a>";
		exit;
	}
	
	$userCurrentEmail=$userid['email'];
	$userCurrentFirst=$userid['firstname'];
	$userCurrentLast=$userid['lastname'];
	$userCurrentPassword=$userid['password'];
	echo $userCurrentEmail;
        echo $userCurrentFirst;
        echo $userCurrentLast;
        echo $userCurrentPassword;
	
	if($userEmail != $userCurrentEmail){
		$userCurrentEmail=$userEmail;
		$emailModified=true;
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
	
	$query="UPDATE USERS SET firstname='$userCurrentFirst', lastname='$userCurrentLast', email='$userCurrentEmail', password='$userCurrentPassword' WHERE id=$sessionid;";
	$result=$db->query($query);

	if($emailModified){
		session_destroy();
		session_start();
		$_SESSION['logged_on'] = true;
		$_SESSION['id']=$sessionid;
	}
	
	header("Location: profile.php");
?>