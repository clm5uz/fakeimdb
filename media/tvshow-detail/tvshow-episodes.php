<?php
/* Connect to database */
include_once("../library.php");
$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}

/* Get information from $routingParams */
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
$mediaId = $data->mediaId;

/* Query database */
$results =
  $db->query(
  "SELECT *
  FROM episode
  NATURAL JOIN
  tv_show
  WHERE media_id = $mediaId
  ORDER BY season,episode;")
  or die ("Invalid Query: " . $db->error());
$num_rows = $results->num_rows;
$tvshow_episodes = array();
for($row_iter = 0; $row_iter < $num_rows; $row_iter++) {
   $row = $results->fetch_array();
   array_push($tvshow_episodes, $row);
}
/* Return results from query */
echo json_encode($tvshow_episodes);
//echo "numrows: $num_rows";

/* Close connection */
mysqli_close($db);
?>
