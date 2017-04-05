<?php
    require_once('media/library.php');
    $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        return null;
    }

    echo "<ul class=\"list-group\">";

    $name = $_GET['name'];

    if ($name != "") {

    $stmt = $db_connection->stmt_init();

    if($stmt->prepare("SELECT first_name, last_name FROM user WHERE first_name LIKE ? OR last_name LIKE ? ") or die(mysqli_error($db))) {
		$name = '%' . $name . '%';
		$stmt->bind_param('ss', $name, $name);
		// Execute the statement.
                $stmt->execute();
		$stmt->bind_result($first_name, $last_name);
		$stmt->store_result();
		while ($data = $stmt->fetch()) {
			echo "<li class=\"list-group-item\">" . $first_name . " " . $last_name . "</li>";
		}		
	}
	echo "</ul>";
    }
    mysqli_close($db_connection);
?>
