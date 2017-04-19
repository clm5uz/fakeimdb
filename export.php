<?php
	session_start();
	require_once('viewonly_permissions.php');
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	if (mysqli_connect_errno()) {
	        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}	

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=' . $_SESSION['firstName'] . '_' . $_SESSION['lastName'] . '_media_to_watch.csv');	

	$output = fopen("php://output", 'w');
	fputcsv($output, array('Title', 'Year Released', 'Genre'));
	$stmt = $db_connection->stmt_init();
        if($stmt->prepare("select media_id, title, year_released, genre from wants_to_watch natural join media natural join user where user_id = ? ") or die(mysqli_error($db))) {
		$userID = $_SESSION['userID'];
		$stmt->bind_param('s', $userID);
		// Execute the statement.
                $stmt->execute();
		$stmt->bind_result($media_id, $title, $year_released, $genre);
		$stmt->store_result();
		while ($data = $stmt->fetch()) {
			fputcsv($output, array($title, $year_released, $genre));
		}		
	}
	mysqli_close($db_connection);
	fclose($output);
	exit;
?>
