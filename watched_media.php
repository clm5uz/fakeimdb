<?php
	session_start();
	require_once('media/library.php');
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	if (mysqli_connect_errno()) {
	        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}	

    	echo "<table class=\"table\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Your Rating</th></tr>";

    
	$stmt = $db_connection->stmt_init();
	$url = "#";
        if($stmt->prepare("select media_id, title, year_released, genre, star_rating from watched natural join media natural join user where user_id = ? ") or die(mysqli_error($db))) {
		$userID = $_SESSION['userID'];
		$stmt->bind_param('s', $userID);
		// Execute the statement.
                $stmt->execute();
		$stmt->bind_result($media_id, $title, $year_released, $genre, $star_rating);
		$stmt->store_result();
		while ($data = $stmt->fetch()) {
			echo "<tr>";
		        echo "<td><a href=\"" . $url . "\">" . $title . "</td>";
		        echo "<td>" . $year_released . "</td>";
		        echo "<td>" . $genre . "</td>";
			echo "<td>" . $star_rating . "</td>";
		        echo "</tr>";
		}		
	}
	echo "</table>";
	mysqli_close($db_connection);
?>
