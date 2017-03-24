<?php
	// Start session.
	session_start();
        require_once('media/library.php');
	// Connect to db.
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    	if (mysqli_connect_errno()) {
        	echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}

	// Use a prepared statement to check if user exists.
	$stmt = $db_connection->stmt_init();
        if($stmt->prepare("select user_id, first_name, last_name from user where username = ? and password = ? ") or die(mysqli_error($db))) {
                // Get parameters and bind to statement.
		$username = $_POST['inputUsername'];
		$password = $_POST['inputPassword'];
		$stmt->bind_param('ss', $username, $password);
		// Execute the statement.
                $stmt->execute();
		$stmt->bind_result($user_id, $first_name, $last_name);
		$stmt->store_result();
		if ($stmt->num_rows == 1) {
			while($data = $stmt->fetch()) {
				// Set session variables.
				$_SESSION['loggedIn'] = True;
				$_SESSION['userID'] = $user_id;
				$_SESSION['firstName'] = $first_name;
				$_SESSION['lastName'] = $last_name;
			}
		} else {
			// Destroy session.
			session_destroy();
		}
                $stmt->close();
        }

	// Close db connection.
        $db_connection->close();
	// Redirect back to index.php
 	header('Location: index.html');
?>
