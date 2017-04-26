<?php
	
        require_once('media/library.php');
	$url1 = "media/#!/movies/";
	$url2 = "media/#!/episodes/";
    	$db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
	$url = $_SERVER['REQUEST_URI'];
	parse_str($url);
	/*echo $searchType
	echo $ser*/
    	if (mysqli_connect_errno()) {
        	echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        	return null;
    	}

	echo "<table class=\"table table-boardered\"><tr><th>Title</th></tr>";

	$searchType = $_GET['searchType'];
	
        $stmt = $db_connection->stmt_init();
	if($searchType == "Title"){
        if($stmt->prepare("select * from media where title like ?") or die(mysqli_error($db))) {
           	$searchString = '%' . $_GET['ser'] . '%';
            $stmt->bind_param('s', $searchString);
           	$stmt->execute();
            $stmt->bind_result($media_id, $title, $year_released, $genre);
            while($stmt->fetch()) {
                echo "<tr>";
           	echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
		echo "</tr>";
            }
   	        $stmt->close();
       	}
	}
	if($searchType == "Genre"){
        if($stmt->prepare("select * from media where genre like ?") or die(mysqli_error($db))) {
            $searchString = '%' . $_GET['ser'] . '%';
            $stmt->bind_param('s', $searchString);
            $stmt->execute();
            $stmt->bind_result($media_id, $title, $year_released, $genre);
            while($stmt->fetch()) {
                echo "<tr>";
                echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
                echo "</tr>";
            }
            $stmt->close();
        }
    }
	if($searchType == "Year"){
        if($stmt->prepare("select * from media where year_released like ?") or die(mysqli_error($db))) {
            $searchString = '%' . $_GET['ser'] . '%';
            $stmt->bind_param('s', $searchString);
            $stmt->execute();
            $stmt->bind_result($media_id, $title, $year_released, $genre);
            while($stmt->fetch()) {
                echo "<tr>";
                echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
                echo "</tr>";
            }
            $stmt->close();
        }
    }
	if($searchType == "Actor"){
		$searchString = '%' . $_GET['ser'] . '%';
		$secondString = strstr($searchString, ' ', true) ?: $searchString;
    	if(strcmp($searchString, $secondString) == 0){
            if($stmt->prepare("select * from media Natural Join acts_in Natural Join actor where first_name like ? or last_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['ser'] . '%';
    		    $secondString = strstr($searchString, ' ', true) ?: $searchString;
    		    $num = strlen($secondString);
        		if (strcmp($searchString, $secondString) != 0){
        			$thirdString = '%' . substr($searchString, $num + 1);
        			$secondString = $secondString . '%';
        		} else {
        			$thirdString = $searchString;
        		}
                $stmt->bind_param('ss', $secondString, $thirdString);
                $stmt->execute();
                $stmt->bind_result($actor_id, $media_id, $title, $year_released, $genre, $first_name, $last_name);
                while($stmt->fetch()) {
                    echo "<tr>";
                    echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
                    echo "</tr>";
                }
                $stmt->close();
    	   }
        } else {
            if($stmt->prepare("select * from media Natural Join acts_in Natural Join actor where first_name like ? and last_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['ser'] . '%';
                $secondString = strstr($searchString, ' ', true) ?: $searchString;
                $num = strlen($secondString);
                if (strcmp($searchString, $secondString) != 0){
                    $thirdString = '%' . substr($searchString, $num + 1);
                    $secondString = $secondString . '%';
                } else{
                    $thirdString = $searchString;
                }
                $stmt->bind_param('ss', $secondString, $thirdString);
                $stmt->execute();
                $stmt->bind_result($actor_id, $media_id, $title, $year_released, $genre, $first_name, $last_name);
                while($stmt->fetch()) {
                    echo "<tr>";
                    echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
                    echo "</tr>";
                }
                $stmt->close();
            }
	    }
    }
	if($searchType == "Director"){
        $searchString = '%' . $_GET['ser'] . '%';
        $secondString = strstr($searchString, ' ', true) ?: $searchString;
		
        if(strcmp($searchString, $secondString) == 0){
            
            if($stmt->prepare("select * from media Natural Join directs Natural Join director where first_name like ? or last_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['ser'] . '%';
                $secondString = strstr($searchString, ' ', true) ?: $searchString;
                $num = strlen($secondString);
                if (strcmp($searchString, $secondString) != 0){
                    $thirdString = '%' . substr($searchString, $num + 1);
                    $secondString = $secondString . '%';
                } else {
                    $thirdString = $searchString;
                }
                $stmt->bind_param('ss', $secondString, $thirdString);
                $stmt->execute();
                $stmt->bind_result($director_id, $media_id, $title, $year_released, $genre, $first_name, $last_name);
                while($stmt->fetch()) {
                        echo "<tr>";
                        echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
                        echo "</tr>";
                }
                $stmt->close();
            }
        } else {
            if($stmt->prepare("select * from media Natural Join directs Natural Join director where first_name like ? and last_name like ?") or die(mysqli_error($db))) {
                $searchString = '%' . $_GET['ser'] . '%';
                $secondString = strstr($searchString, ' ', true) ?: $searchString;
                $num = strlen($secondString);
                if (strcmp($searchString, $secondString) != 0){
                    $thirdString = '%' . substr($searchString, $num + 1);
                    $secondString = $secondString . '%';
                } else {
                    $thirdString = $searchString;
                }
		
                $stmt->bind_param('ss', $secondString, $thirdString);
		
                $stmt->execute();
		
                $stmt->bind_result($director_id, $media_id, $title, $year_released, $genre, $first_name, $last_name);
		
                while($stmt->fetch()) {
                    echo "<tr>";
                    echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
                    echo "</tr>";
                }
                $stmt->close();
            }
        }
    }
	
	if($searchType == "Studio"){
	if($stmt->prepare("select * from media Natural Join created_by Natural Join studio where studio_name like ?") or die(mysqli_error($db))) {
	    	$searchString = '%' . $_GET['ser'] . '%';
	    
		$stmt->bind_param('s', $searchString);
            	$stmt->execute();
            	$stmt->bind_result($studio_id, $media_id, $title, $year_released, $genre, $studio_name, $location_city, $location_state, $location_country);
            	while($stmt->fetch()) {
                	echo "<tr>";
                	echo "<td><a href=\"" . $url1 . $media_id  . "\">" . $title . "</a></td>";
                	echo "</tr>";
            }
            $stmt->close();
        }
    }
	if($searchType == "Episode"){
	if($stmt->prepare("select * from episode where title like ?") or die(mysqli_error($db))) {
		$searchString = '%' . $_GET['ser'] . '%';
		$stmt->bind_param('s', $searchString);
		$stmt->execute();
		$stmt->bind_result($media_id, $season, $episode, $title, $duration);
		while($stmt->fetch()) {
			$ses = '/' . $season;
			$ep = '/' . $episode;
			echo "<tr>";
			echo "<td><a href=\"" . $url2 . $media_id . $ses . $ep .  "\">" . $title . "</a></td>";
			echo "</tr>";
		}
		$stmt->close();
	}
	}


	
	if($searchType == "All"){
        if($stmt->prepare("select * from media where title like ? or genre like ? or year_released like ?") or die(mysqli_error($db))) {
            $searchString = '%' . $_GET['ser'] . '%';
            $stmt->bind_param('sss', $searchString, $searchString, $searchString);
            $stmt->execute();
            $stmt->bind_result($media_id, $title, $year_released, $genre);
            while($stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $title . "</td>";
                echo "</tr>";
            }
            $stmt->close();
        }
    }	
	echo "</table>";
    $db_connection->close();
	
?>
