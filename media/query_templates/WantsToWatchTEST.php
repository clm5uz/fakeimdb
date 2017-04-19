<?php
include_once("./library.php");
$db = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$user_id = 66;
$media_id = 12;
$sql="SELECT * FROM wants_to_watch";
$results = $db->query("SELECT  * FROM wants_to_watch WHERE user_id = $user_id AND media_id = $media_id
") or die ("Failed to connect to wants_to_watch: " . $db->error());
$num_rows = $results->num_rows;
#Remove media_id from wants_to_watch table
if ($num_rows > 0):
  //echo "Already on your list! </br>";
  $query = "DELETE FROM wants_to_watch WHERE user_id = $user_id AND media_id = $media_id";
  $db->query($query) or die("Failed to delete media from wants_to_watch: ".$db->error);
  echo "Removed from your list!";
#Add media_id to wants_to_watch table
else:
 //echo "Eligible for watching! </br>";
 $query = "insert into wants_to_watch values ('$user_id','$media_id')";
 $db->query($query) or die("Failed to insert media to wants_to_watch: ".$db->error);
 echo "Added to your list!";
endif;

mysqli_close($db);
?>
