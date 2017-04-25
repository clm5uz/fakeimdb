<?php
	session_start();
	require_once('modify_permissions.php');
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	if (mysqli_connect_errno()) {
	        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}	

	$mediaID = $_POST['mediaIDValue'];
	echo $mediaID;
	$rating = $_POST['rateInput'];
	echo $rating;
    
	$stmt = $db_connection->stmt_init();
        if($stmt->prepare("INSERT INTO `watched`(`user_id`, `media_id`, `date`, `star_rating`) VALUES (?, ?, ?, ?)") or die(mysqli_error($db))) {
		$userID = $_SESSION['userID'];
		$mediaID = $_POST['mediaIDValue'];
		$rating = $_POST['rateInput'];
		$date = date("d/m/Y");
		$stmt->bind_param('ssss', $userID, $mediaID, $date, $rating);
		// Execute the statement.
                $stmt->execute();
	}

	$stmt_delete = $db_connection->stmt_init();
        if($stmt_delete->prepare("DELETE FROM `wants_to_watch` WHERE user_id = ? AND media_id = ?") or die(mysqli_error($db))) {
                $userID = $_SESSION['userID'];
                $mediaID = $_POST['mediaIDValue'];
                $stmt_delete->bind_param('ss', $userID, $mediaID);
                // Execute the statement.
                $stmt_delete->execute();
        }
	mysqli_close($db_connection);
	header('Location: profile.html');
?>
