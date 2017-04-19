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
/* Remove media from user's watch list */
if ($num_rows > 0):
  $query = "DELETE FROM wants_to_watch WHERE user_id = $user_id AND media_id = $media_id";
  $db->query($query) or die("Failed to delete media from wants_to_watch: ".$db->error);
  //Set up button to add media if clicked again
  $watch_response = $watch_button->addToList();
/* Add media to user's watch list */
else:
  $query = "insert into wants_to_watch values ('$user_id','$media_id')";
  $db->query($query) or die("Failed to insert media to wants_to_watch: ".$db->error);
  //Set up button to remove media if clicked again
  $watch_response = $watch_button->removeFromList();
endif;

/* Return results from query */
echo json_encode($watch_response);

/* Close connection */
mysqli_close($db);
?>
