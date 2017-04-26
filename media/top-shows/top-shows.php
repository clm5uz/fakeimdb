<?php
/* Connect to database */
include_once("../library.php");
$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

/* Create list of genres */
$genres = array('Action','Adventure','Comedy','Crime','Documentary','Fantasy','Horror','Romance','Sports','Family','Thriller');

/* Create master array list */
$results_master = array();

/* Get top shows for each genre */
foreach ($genres as $key) {
  $query =
  "SELECT media_id, title, year_released, genre, avg(star_rating)
  AS avg_rating
  FROM media NATURAL JOIN tv_show NATURAL JOIN watched
  WHERE genre = '$key'
  GROUP BY media_id
  ORDER BY avg_rating DESC
  LIMIT 5";
  $results = $db->query($query) or die ("Invalid Genre: " . $db->error());
  $num_rows = $results->num_rows;
  $top_shows = array();
  /* Push all top shows into one array */
  for($row_iter = 0; $row_iter < $num_rows; $row_iter++) {
     $row = $results->fetch_array();
     array_push($top_shows, $row);
    }
  /* Set new array with genre as key */
  $results_master[$key] = $top_shows;
}

/* Return results from query */
echo json_encode($results_master);

/* Close connection */
mysqli_close($db);
?>
