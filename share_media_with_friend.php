<?php
	// Start session.
	session_start();
        require_once('modify_permissions.php');
	// Connect to db.
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    	if (mysqli_connect_errno()) {
        	echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}
	
	// Use a prepared statement to insert the user into user table.
	$stmt = $db_connection->stmt_init();
        if($stmt->prepare("insert into shared_with values (?, ?, ?)") or die(mysqli_error($db))) {
                // Get parameters and bind to statement.
		$uid_sending = $_SESSION['userID'];
		$uid_receiving = $_POST['friendInput'];
		$media_id = $_POST['shareMediaIDValue'];
		echo $uid_sending;
		echo $uid_receiving;
		echo $media_id;
		$stmt->bind_param('sss', $uid_sending, $uid_receiving, $media_id);
		// Execute the statement.
                $stmt->execute();
                // Close statement.
		$stmt->close();
        }
	// Close db connection.
        $db_connection->close();
	// Redirect back to index page.
 	header('Location: profile.html');
?>
