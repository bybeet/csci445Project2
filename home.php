<?php
	require('header.php');	
	require('database.php');

	//Query the current user from the database.
	$result = $db->query("SELECT * FROM USERS WHERE id = '".$_SESSION['id']."';");
	$userData = $result->fetch_array(MYSQLI_ASSOC);

?>

	<div>
		<p><?php echo $userData['firstname']; ?>, you're logged in!</p>
	</div>
	<h2>Status Updates</h2>
	<?php
			//Get status updates from user and the users friends.	
			$userNum=$userData['id'];
			$query_string="SELECT DISTINCT STATUS_UPDATES.* FROM FRIENDS, STATUS_UPDATES WHERE FRIENDS.userid =  '$userNum' AND STATUS_UPDATES.userid = FRIENDS.friendid OR STATUS_UPDATES.userid = '$userNum' ORDER BY id DESC";
			$friends=$db->query($query_string);
			//If the user has no friends or status updates, show them a little note
			//to help them get started.
			if($friends->num_rows == 0){
				echo "<p>Post a 
					<a href=\"profile.php\">status</a> or add a 
					<a href=\"friend_search.php\">friend</a> to see
					status updates.</p>";
			}

			//Show the 20 most recent status updates.
			for($i=0; $i<20; $i++){
				$currentRow = $friends->fetch_assoc();
				//If there are less than 20, display them all,
				//then exit the for loop.
				if($currentRow == NULL){
					break;
				}
				
				$currentUserNum=$currentRow['userid'];
				$userDbData=$db->query("SELECT * FROM USERS WHERE id = '$currentUserNum'");
				$userData=$userDbData->fetch_assoc();
				
				$userFirstName=$userData['firstname'];
				$userLastName=$userData['lastname'];
				$userEmail = $userData['email'];
				$updateTime = $currentRow['lastUpdated'];
				$status=$currentRow['status'];
				echo "<h3>$userFirstName $userLastName said:</h3>";
				echo "<p>$status<br />$updateTime</p>";

				//Hideous code for showing the comments for each status. Logic
				// nearly identical to comment logic in profile.php
				$statusid = $currentRow['id'];
				$query_string = "SELECT * FROM STATUS_COMMENTS where statusid = $statusid";
				$comments = $db->query($query_string);
				while( $comment = $comments->fetch_array(MYSQLI_ASSOC)){
					$commentUserId = $comment['userid'];
					$query_string = "SELECT * FROM USERS where id = $commentUserId;";
					$result = $db->query($query_string);
					$commentCreator = $result->fetch_array(MYSQLI_ASSOC);

					$commenterFirstName = $commentCreator['firstname'];
					$commenterLastName = $commentCreator['lastname'];
					$commenterEmail = $commentCreator['email'];
					$commentText = $comment['comment'];
					$updateTime = $comment['lastUpdated'];

					echo "<h4>$commenterFirstName $commenterLastName commented:</h4>";
					echo "<p>$commentText<br />$updateTime</p>";

					//If they created the comment or they own the status, allow them to delete comments.
					if($_SESSION['id'] === $commentUserId || $_SESSION['id'] === $currentUserNum){
					?>
					<form action="delete_comment.php" method="post">
						<input name="comment_id" value="<?= $comment['id']; ?>" type="hidden"/>
						<input type="submit" value="Delete Comment"/>
						<input type="hidden" name="return_page" value="<?php 
							echo "home.php";
						?>"/>
					</form>
					<?php
					}
				}
				?>
				<form id="comment_form" method="post" action="add_comment.php">
					<label for="comment_text">Comment:</label>
					<input type="hidden" name="return_page" value="<?php 
						echo "home.php";
					?>"/>
					<textarea rows="5" cols="30" id="comment_text" name="comment_text"></textarea>
					<input type="hidden" name="statusid" value="<?= $statusid; ?>" />
					<br />
					<input type="submit" value="Submit Comment" />
				</form>
				<?php
			}
		?>

</body>
</html>
