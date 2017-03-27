<?php
/* Connect to database */
include_once("../library.php");
$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

/* Get information from $routingParams */
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
$movieId = $data->movieId;

/* Query database */
$results =
  $db->query(
  "SELECT
  title,
  year_released,
  genre,
  movie_rating,
  duration,
  GROUP_CONCAT(first_name, ' ', last_name SEPARATOR ', ') AS 'directors'
  FROM media
  NATURAL JOIN movie
  NATURAL JOIN directs
  NATURAL JOIN director
  WHERE media_id = $movieId") or die ("Invalid Query: " . $db->error());
$num_rows = $results->num_rows;
$movie_info = $results->fetch_array();
$title = $movie_info['title'];

/* Return results from query */
echo json_encode($movie_info);

/* Close connection */
mysqli_close($db);
?>
