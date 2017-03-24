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
	echo $_POST['inputUsername'];
	echo $_POST['inputPhone'];
	// Use a prepared statement to insert the user into user table.
	$stmt = $db_connection->stmt_init();
        if($stmt->prepare("insert into user (username, password, first_name, last_name, email) values (?, ?, ?, ?, ?) ") or die(mysqli_error($db))) {
                // Get parameters and bind to statement.
		$username = $_POST['inputUsername'];
		$password = $_POST['inputPassword1'];
		$firstName = $_POST['inputFirstname'];
		$lastName = $_POST['inputLastname'];
		$email = $_POST['inputEmail'];
		$stmt->bind_param('sssss', $username, $password, $firstName, $lastName, $email);
		// Execute the statement.
                $stmt->execute();
		// Set session variables.
		$_SESSION['loggedIn'] = True;
		$_SESSION['firstName'] = $first_name;
		$_SESSION['lastName'] = $last_name;
                // Close statement.
		$stmt->close();
        }

	// Get the new user's ID.
	$userID = "";
        $stmt_get_id = $db_connection->stmt_init();
        if($stmt_get_id->prepare("select user_id from user where username = ? and password = ? ") or die(mysqli_error($db))) {
                // Get parameters and bind to statement.
                $username = $_POST['inputUsername'];
                $password = $_POST['inputPassword1'];
		$stmt_get_id->bind_param('ss', $username, $password);
                // Execute the statement.
                $stmt_get_id->execute();
		$stmt_get_id->bind_result($user_id);
                $stmt_get_id->store_result();
                if ($stmt_get_id->num_rows == 1) {
                        while($data = $stmt_get_id->fetch()) {
                      		$userID = $user_id; 
				$_SESSION['userID'] = $user_id; 
			}
                } else {
                        // Destroy session.
                        session_destroy();
                }
                $stmt_get_id->close();
        }
	
	// Use prepared statement to insert user phone into user table.
	$phone = $_POST['inputPhone'];
	if ($userID != "" && $phone != "") {
		$stmt_phone = $db_connection->stmt_init();
	        if($stmt_phone->prepare("insert into user_phone values (?, ?) ") or die(mysqli_error($db))) {
        	        // Bind parameters.
	                $stmt_phone->bind_param('ss', $userID, $phone);
        	        // Execute the statement.
                	$stmt_phone->execute();
	                // Close statement.
        	        $stmt_phone->close();
	        }
	}
	// Close db connection.
        $db_connection->close();
	// Redirect back to index page.
 	header('Location: index.html');
?>
