<?php
/* Connect to database */
include_once("../library.php");
$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

/* Get information from $routingParams */
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
$str = $data->mediaId;
$se = $data->seasonId;
$ep = $data->episodeId;

/* Query database */
$results =
  $db->query(
  "SELECT *, episode.title
  AS 'episode_title', GROUP_CONCAT(first_name, ' ', last_name SEPARATOR ', ')
  AS 'directors'
  FROM episode
  LEFT JOIN media
  ON episode.media_id = media.media_id
  LEFT JOIN directs
  ON episode.media_id = directs.media_id
  NATURAL JOIN director
  WHERE episode.media_id = $str
  AND season = $se
  AND episode = $ep") or die ("Invalid Query: " . $db->error());
$num_rows = $results->num_rows;
$episode_info = $results->fetch_array();
//$title = $movie_info['title'];

/* Return results from query */
echo json_encode($episode_info);

/* Close connection */
mysqli_close($db);
?>
