<?php

	require('header.php');
	require('database.php');
        
        $firstname = strip_tags($_POST['search_first_name']);
	$lastname = strip_tags($_POST['search_last_name']);
	$email = strip_tags($_POST['search_email']);
        $where_statement = "WHERE ";
        $where_used = false;
        
        if($firstname != ""){
            $where_statement = $where_statement . "firstname = '" . $firstname . "'";
            $where_used = true;
        }
        if($lastname != ""){
            if(!$where_used){
                $where_statement = $where_statement . "lastname = '" . $lastname . "'";
                $where_used = true;
            }else{
                $where_statement = $where_statement . " AND lastname = '" . $lastname . "'";
            }
        }
        if($email != ""){
            if(!$where_used){
                $where_statement = $where_statement . "email = '" . $email . "'";
                $where_used = true;
            }else{
                $where_statement = $where_statement . " AND email = '" . $email . "'";
            }
        }
        
	$result = $db->query("SELECT * FROM USERS WHERE id = '".$_SESSION['id']."';");
	$userData = $result->fetch_array(MYSQLI_ASSOC);
        if($where_used){
            $result = $db->query("SELECT * FROM USERS " . $where_statement);
        }else{
            $result = $db->query("SELECT * FROM USERS");
        }
	
?>
		<h2>Member Page</h2>
                <form id="registration_form" method="post" action="friend_search.php" enctype="multipart/form-data">
                        <label for="registration_first_name">First Name:
                        <input type="text" id="search_first_name"  name="search_first_name"/>
                        </label>
                        <br />
                        <label for="registration_last_name">Last Name:
                        <input type="text" id="search_last_name" name="search_last_name"/>
                        </label>
                        <br />
                        <label for="registration_email">Email Address:
                        <input type="text" id="search_email" name="search_email"/>
                        </label>
                        <br />
                        <input type="submit" value="Submit" />                        
                </form>
		<table cellpadding="5">
		<tr>
		<th>Name</th>
		<th>Email</th>
		<th></th>
		</tr>
		<?php
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			if($row['id'] == $_SESSION['id']){
				continue;
			}
			?>
				<tr>
				<td><?= $row['firstname']." ".$row['lastname']; ?></td>
				<td><?php echo $row["email"]; ?></td>
				<?php
					//Check to see if the member is already a friend of the user.
					//If they are, then change the button text and logic to take them to that
					//member's profile page.
					$alreadyFriend = $db->query("SELECT * FROM FRIENDS where userid = '".$userData['id']."' and friendid ='".$row['id']."';");
					if($alreadyFriend->num_rows == 0){
				?>
					<form action="add_friend.php" method="post">
						<input name="new_friend_id" value="<?= $row['id']; ?>" type="hidden"/>
						<td>
							<input type="submit" value="Add as a friend"/>
							<input name="return_page" value="friend_search.php" type="hidden"/>
						</td>
					</form>
				<?php
					}
					else{
				?>
				<form action="profile.php" method="get">
					<input name="friend_email" value="<?= $row['email']; ?>" type="hidden"/>
					<td>
						<input type="submit" value="View friend profile"/>
					</td>
				</form>
			<?php
				}
			?>
				</tr>
		<?php
			}
		?>
		</table>
		<?php
	
	$result->free();
	$db->close();

?>
	</body>
</html>


