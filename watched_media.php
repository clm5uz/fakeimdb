<?php
	session_start();
	require_once('viewonly_permissions.php');
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	if (mysqli_connect_errno()) {
	        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}
	
	// Display watched media.
    	echo "<table class=\"table\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Your Rating</th><th></th></tr>";

    
	$stmt = $db_connection->stmt_init();
        if($stmt->prepare("select media_id, title, year_released, genre, star_rating from watched natural join media natural join user where user_id = ? ") or die(mysqli_error($db_connection))) {
		$userID = $_SESSION['userID'];
		$stmt->bind_param('s', $userID);
		// Execute the statement.
                $stmt->execute();
		$stmt->bind_result($media_id, $title, $year_released, $genre, $star_rating);
		$stmt->store_result();
		while ($data = $stmt->fetch()) {
			$url = "media/#!/movies/";
			$stmt_check = $db_connection->stmt_init();
                        if($stmt_check->prepare("select media_id from tv_show where media_id = ? ") or die(mysqli_error($db_connection))) {
                                $stmt_check->bind_param('s', $media_id);
                                $stmt_check->execute();
                                $stmt_check->bind_result($show_media_id);
                                while ($check_data = $stmt_check->fetch()) {
					$url = "media/#!/tvshows/";
                                }
                        }
			echo "<tr>";
		        echo "<td><a href=\"" . $url . $media_id . "\">" . $title . "</td>";
		        echo "<td>" . $year_released . "</td>";
		        echo "<td>" . $genre . "</td>";
			echo "<td>" . $star_rating . "</td>";	
			echo "<td><button onclick=\"openShareModal(" . $media_id . ");\" class=\"btn btn-xs btn-success pull-right\"><i class=\"fa fa-share\"></i></button></td>";
		        echo "</tr>";
		}		
	}
	echo "</table>";
	mysqli_close($db_connection);
?>
