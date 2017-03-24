<?php
	require_once('media/library.php');
    	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    	if (mysqli_connect_errno()) {
        	echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
	        return null;
	}	
	
	$stmt = $db_connection->stmt_init();
	
	if($stmt->prepare("select * from user where username = ?") or die(mysqli_error($db))) {
		$username = $_GET['username'];
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			// The username exists.
			echo "true";
		} else {
			// The username does not exist.
			echo "false";
		}
	
		$stmt->close();
	}
	
	$db_connection->close();
?>
