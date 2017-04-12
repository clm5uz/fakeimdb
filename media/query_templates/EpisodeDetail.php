<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$str = $_POST['mediaID'];
$se = $_POST['season'];
$ep = $_POST['episode'];

$results = $con->query(
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
  AND episode = $ep") or die ("Invalid Query: " . $con->error());


$num_rows = $results->num_rows;
for ($row_iter = 0; $row_iter < $num_rows; $row_iter++) {
    $sql_row = $results->fetch_array();
    $title = $sql_row['title'];
    $ep_title = $sql_row['episode_title'];
    $year = $sql_row['year_released'];
    $genre = $sql_row['genre'];
    $season = $sql_row['season'];
    $episode = $sql_row['episode'];
    $rating = $sql_row['tv_rating'];
    $directors = $sql_row['directors'];
     echo "<h1><em>$title</em></h1>
<h2><em>$ep_title</em></h2>
<p><strong>Director(s): $directors</strong></p>
<p><strong>Released: $year&nbsp;</strong></p>
<p><strong>Genre: $genre</strong></p>
<p><strong>Season: $season</strong></p>
<p><strong>Episode: $episode</strong></p>
<p><strong>Rating: $rating</strong></p>";
}


mysqli_close($con);
?>
