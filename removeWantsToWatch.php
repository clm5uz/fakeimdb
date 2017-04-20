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
        if($stmt->prepare("delete from wants_to_watch where user_id = ? and media_id = ? ") or die(mysqli_error($db))) {
                // Get parameters and bind to statement.
		$userID = $_SESSION['userID'];
		$mediaID = $_POST['mediaID'];
		$stmt->bind_param('ss', $userID, $mediaID);
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
