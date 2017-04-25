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
  "SELECT *, GROUP_CONCAT(first_name, ' ', last_name SEPARATOR ', ')
  AS 'directors'
  FROM media
  NATURAL JOIN tv_show
  NATURAL JOIN directs
  NATURAL JOIN director
  WHERE media_id = $mediaId;")
  or die ("Invalid Query: " . $db->error());
$num_rows = $results->num_rows;
$tvshow_info = $results->fetch_array();
$title = $tvshow_info['title'];

/* Return results from query */
echo json_encode($tvshow_info);
//echo "numrows: $num_rows";

/* Close connection */
mysqli_close($db);
?>
