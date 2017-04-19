<?php
include_once("./library.php");
$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/* Get information from $routingParams */
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
$user_id = $data->user_id;
$media_id = $data->media_id;

/* Query database */
$sql="SELECT * FROM wants_to_watch";
$results = $db->query("SELECT  * FROM wants_to_watch WHERE user_id = $user_id AND media_id = $media_id
") or die ("Failed to connect to wants_to_watch: " . $db->error());
$num_rows = $results->num_rows;

/* Set up class to get button attributes */
include("WatchButton.php");
$watch_button = new WatchButton();
/* User is already watching media */
if ($num_rows > 0):
  $watch_response = $watch_button->removeFromList();
/* User is eligible to watch media */
else:
  $watch_response = $watch_button->addToList();
endif;

/* Return results from query */
echo json_encode($watch_response);

/* Close connection */
mysqli_close($db);
?>
