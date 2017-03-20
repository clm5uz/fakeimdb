<?php
        require_once('media/library.php');
    	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	echo "here";
    	if (mysqli_connect_errno()) {
        	echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}
	$searchType = $_POST['hiddenValue'];
	echo $searchType;
        $stmt = $db_connection->stmt_init();
	if($searchType == "Title"){
        if($stmt->prepare("select * from media where title like ?") or die(mysqli_error($db))) {
               	$searchString = '%' . $_POST['ser'] . '%';
                $stmt->bind_param('s', $searchString);
               	$stmt->execute();
	        $stmt->bind_result($media_id, $title, $year_released, $genre);
                while($stmt->fetch()) {
               	        echo $title;
	        }
       	        $stmt->close();
       	}
	}
	if($searchType == "Genre"){
        if($stmt->prepare("select * from media where genre like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_POST['ser'] . '%';
                $stmt->bind_param('s', $searchString);
                $stmt->execute();
                $stmt->bind_result($media_id, $title, $year_released, $genre);
                while($stmt->fetch()) {
                        echo $title;
                }
                $stmt->close();
        }
        }
	if($searchType == "Year"){
        if($stmt->prepare("select * from media where year_released like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_POST['ser'] . '%';
                $stmt->bind_param('s', $searchString);
                $stmt->execute();
                $stmt->bind_result($media_id, $title, $year_released, $genre);
                while($stmt->fetch()) {
                        echo $title;
                }
                $stmt->close();
        }
        }
	if($searchType == "All"){
        if($stmt->prepare("select * from media where title like ? or genre like ? or year_released like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_POST['ser'] . '%';
		echo $searchString;
                $stmt->bind_param('sss', $searchString, $searchString, $searchString);
                $stmt->execute();
                $stmt->bind_result($media_id, $title, $year_released, $genre);
                while($stmt->fetch()) {
                        echo $title;
                }
                $stmt->close();
        }
        }	
        $db_connection->close();
	
?>
