<?php

	require('header.php');
	
	$db = new mysqli(localhost, root, '', team06);
	$result = $db->query("SELECT * FROM USERS");
	
?>
	<h2>Member Page</h2>
<?php


		while($row = $reult->fetch_array(MYSQLI_ASSOC)){
		var_dump($row);
			$rows[] = $row;
		}
		
		foreach($rows as $row){
			var_dump($row);
		}
	
	$result->free();
	$db->close();

?>




