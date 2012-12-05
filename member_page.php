<?php

	require('header.php');
	
	$db = new mysqli(localhost, root, '', team06);
	$result = $db->query("SELECT * FROM USERS");
	
?>
		<h2>Member Page</h2>
<?php
		?>
		<table cellpadding="5">
		<tr>
		<th>Username</th>
		<th></th>
		</tr>
		<?php
		while( $row = $result->fetch_array(MYSQLI_ASSOC)){
			if($row['username'] == $_SESSION['user']){
				continue;
			}
			?>
				<tr>
				<td><?php echo $row["username"]; ?></td>
				<td><button type="button">Add as friend</button></td>
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


