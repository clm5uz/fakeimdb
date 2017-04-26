<?php
	session_start();
	require_once('viewonly_permissions.php');
	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

	if (mysqli_connect_errno()) {
	        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}	

    	echo "<ul class=\"list-group\">";

    
	$stmt = $db_connection->stmt_init();
        if($stmt->prepare("select user_id, first_name, last_name from user where user_id in (select user_id_one from user NATURAL JOIN (SELECT user_id_one, user_id_two as user_id FROM friends_with) as friends_table_two where user_id = ? ) UNION select user_id, first_name, last_name from user where user_id in (select user_id_two from user natural join (SELECT user_id_two, user_id_one as user_id FROM friends_with) as friends_table_one where user_id = ? )") or die(mysqli_error($db))) {
		$userID = $_SESSION['userID'];
		$stmt->bind_param('ss', $userID, $userID);
		// Execute the statement.
                $stmt->execute();
		$stmt->bind_result($user_id, $first_name, $last_name);
		$stmt->store_result();
		while ($data = $stmt->fetch()) {
			echo "<li style=\"display:none;\">" . $user_id  . "</li>";
		        echo "<li class=\"list-group-item\">" . $first_name . " " . $last_name . "<form class=\"pull-right\" action=\"removeFriend.php\" method=\"post\"><input name=\"friendUserID\" id=\"friendUserID\" type=\"hidden\" value=\"" . $user_id  . "\"><button class=\"btn btn-default btn-xs\" type=\"submit\"><i class=\"fa fa-minus\"></i></button></form></li>";
		}		
	}
	echo "</ul>";
	mysqli_close($db_connection);
?>
