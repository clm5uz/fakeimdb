<?php
    session_start();
    require_once('viewonly_permissions.php');
    $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        return null;
    }

    $name = $_GET['name'];

    if ($name != "") {
	$stmt = $db_connection->stmt_init();
	echo "<ul class=\"list-group\">";
	// Try to split the name.
	$name_list = explode(" ", $name);

	$userID = $_SESSION['userID'];
	if (count($name_list) == 1) {
		// Entered one name.
		if($stmt->prepare("SELECT user_id, first_name, last_name FROM user WHERE first_name LIKE ? OR last_name LIKE ? ") or die(mysqli_error($db))) {
	                $name = '%' . $name . '%';
                	$stmt->bind_param('ss', $name, $name);
        	        // Execute the statement.
	                $stmt->execute();
                	$stmt->bind_result($user_id, $first_name, $last_name);
        	        $stmt->store_result();
	                while ($data = $stmt->fetch()) {
				if ($userID != $user_id) {
                        		echo "<li class=\"list-group-item\">" . $first_name . " " . $last_name . "<form class=\"pull-right\" action=\"addFriend.php\" method=\"post\"><input name=\"friendUserID\" id=\"friendUserID\" type=\"hidden\" value=\"" . $user_id  . "\"><button class=\"btn btn-default btn-xs\" type=\"submit\"><i class=\"fa fa-plus\"></i></button></form></li>";
				}
                	}
        	}		
	} else {
		// Entered two names (first and last).
		if($stmt->prepare("SELECT user_id, first_name, last_name FROM user WHERE first_name LIKE ? AND last_name LIKE ? ") or die(mysqli_error($db))) {
	                $first_name = '%' . $name_list[0] . '%';
			$last_name = '%' . $name_list[1] . '%';
                	$stmt->bind_param('ss', $first_name, $last_name);
        	        // Execute the statement.
	                $stmt->execute();
                	$stmt->bind_result($user_id, $first_name, $last_name);
        	        $stmt->store_result();
	                while ($data = $stmt->fetch()) {
				if ($userID != $user_id) {
                        		echo "<li class=\"list-group-item\">" . $first_name . " " . $last_name . "<form class=\"pull-right\" action=\"addFriend.php\" method=\"post\"><input name=\"friendUserID\" id=\"friendUserID\" type=\"hidden\" value=\"" . $user_id  . "\"><button class=\"btn btn-default btn-xs\" type=\"submit\"><i class=\"fa fa-plus\"></i></button></form></li>";
				}
                	}
        	}
	}
	// Complete the list.
	echo "</ul>";
    }
    mysqli_close($db_connection);
?>
