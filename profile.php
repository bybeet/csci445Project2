<?php
	require('header.php');
	require('database.php');

	$users_profile = False;
	$target = "images/";

	//Check to see if this is the current users profile or
	//if the profile is being viewed by a different user.
	//		This determines if the editing buttons are shown to
	//		the user.
	if($_GET['friend_email'] == NULL){
		$users_profile = True;
		$db_query = "SELECT * FROM USERS WHERE id = '".$_SESSION['id']."';";
	}
	else{
		$db_query = "SELECT * FROM USERS WHERE email = '".$_GET['friend_email']."';";
	}

	//Get current profile page info from database.
	$result = $db->query($db_query);
	$result = $result->fetch_array(MYSQLI_ASSOC);

	//Set picture location.
	$pic = $target.$result['image'];
?>
		<h2>Profile - <?php echo $result['email']; ?></h2>
		<img src="<?= $result['image']; ?>" alt="<?= $result['firstname']." ".$result['lastname']; ?> Profile Picture">
		<h3>Information</h3>
			<p>
				Name: <?= $result['firstname']." ".$result['lastname']; ?>
				<br />
				Email: <?= $result['email']; ?>
				<br />
				Age: 
			<?php 
				if( $result['age'] != NULL ){
					echo $result['age']; 
				}
				else{
					echo "Not given";
				}

			?>
			<br />
			Gender: <?= $result['gender']; ?>
			</p>
		<?php
			//Show the edit option if it is the user's profile
			if($users_profile){
		?>
		<div>
			<a href="information.php">Update Information</a>
		</div>
		<?php
			}
		?>
		<h3>Status Updates</h3>
		<?php
			//Show status update box if this is user's profile.
			if($users_profile){
		?>
		<div>
			<form id="status_form" method="post" action="statusUpdate.php">
				<label for="status_text">Status:</label>
				<textarea rows="5" cols="30" id="status_text" name="status_text"></textarea>
				<br />
				<input type="submit" value="Submit" />
			</form>
		</div>
		<?php
			}
		?>
		<?php
			//Get all of the profiles status updates.
			$userNum = $_SESSION['id'];//$result['id'];
			$query_string = "SELECT * from STATUS_UPDATES where userid = '$userNum' ORDER BY id DESC";
			$statusUpdates = $db->query($query_string);
			//Display the 5 most recent statuses.
			$numberOfStatuses=$statusUpdates->num_rows;
			if($numberOfStatuses>5){
				$numberOfStatuses=5;
			}
			for($i=0; $i<1; $i++){
				$currentRow=$statusUpdates->fetch_assoc();
				//If there are less than 5, then exit the loop after all statuses have
				//been used.
				if($currentRow == NULL){
					break;
				}
				
				//Set variables for posting to new pages.
				$userFirstName= $result['firstname'];
				$userLastName= $result['lastname'];
				$updateTime = $currentRow['lastUpdated'];
				$status = $currentRow['status'];

				echo "<h3>$userFirstName $userLastName said:</h3>";
				echo "<p class=\"status_text\">$status</p><p class=\"status_time\">$updateTime</p>";
				if($users_profile){
				?>
					<form action="delete_status.php" method="post">
						<input name="status_id" value="<?= $currentRow['id']; ?>" type="hidden"/>
						<input type="submit" value="Delete Status"/>
					</form>
					<?php
				}

				//Get status id for comments posting.
				$statusid = $currentRow['id'];
				$query_string = "SELECT * FROM STATUS_COMMENTS where statusid = $statusid";
				$comments = $db->query($query_string);
				while( $comment = $comments->fetch_array(MYSQLI_ASSOC)){
					//Get the user who made the comment info.
					$commentUserId = $comment['userid'];
					$query_string = "SELECT * FROM USERS where id = $commentUserId;";
					$commentCreator = $db->query($query_string);
					$commentCreator = $commentCreator->fetch_array(MYSQLI_ASSOC);

					$commenterFirstName = $commentCreator['firstname'];
					$commenterLastName = $commentCreator['lastname'];
					$commenterEmail = $commentCreator['email'];
					$commentText = $comment['comment'];
					$updateTime = $comment['lastUpdated'];

					echo "<h4 class=\"comments\">$commenterFirstName $commenterLastName commented:</h4>";
					echo "<p class=\"comments\">$commentText<br />$updateTime</p>";

					//If the user created comment or this is their profile, let them
					//delete the status.
					if($users_profile || $_SESSION['id'] === $commentUserId){
					?>
					<form action="delete_comment.php" method="post">
						<input name="comment_id" value="<?= $comment['id']; ?>" type="hidden"/>
						<input type="submit" value="Delete Comment"/>
						<input type="hidden" name="return_page" value="<?php 
						//Set the profile page to return to, either the users profile
						// or a users friend's profile.
						$email = $_GET['friend_email'];
						if($users_profile){
							echo "profile.php";
						}
						else{
							echo "profile.php?friend_email=$email";
						}
					?>"/>
					</form>
					<?php
					}
				}
				?>
				<form id="comment_form" method="post" action="add_comment.php">
					<label for="comment_text">Comment:</label>
					<input type="hidden" name="return_page" value="<?php 
						//Same return_page logic as above.
						$email = $_GET['friend_email'];
						if($users_profile){
							echo "profile.php";
						}
						else{
							echo "profile.php?friend_email=$email";
						}
					?>"/>
					<textarea rows="2" cols="30" id="comment_text" name="comment_text"></textarea>
					<input type="hidden" name="statusid" value="<?= $statusid; ?>" />
					<br />
					<input type="submit" value="Submit Comment" />
				</form>
			<?php
			}
		?>
	</body>
</html>
