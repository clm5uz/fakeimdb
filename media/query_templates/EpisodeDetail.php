<?php

include_once("./library.php");
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$str = 16;

$results = $con->query(
  "SELECT *, GROUP_CONCAT(first_name, ' ', last_name SEPARATOR ', ') AS 'directors' FROM media NATURAL JOIN tv_show NATURAL JOIN directs NATURAL JOIN director WHERE media_id = $str") or die ("Invalid Query: " . $con->error());


$num_rows = $results->num_rows;
for ($row_iter = 0; $row_iter < $num_rows; $row_iter++) {
    $sql_row = $results->fetch_array();
    $title = $sql_row['title'];
    $year = $sql_row['year_released'];
    $genre = $sql_row['genre'];
    $seasons = $sql_row['number_of_seasons'];
    $rating = $sql_row['tv_rating'];
    $directors = $sql_row['directors'];
     echo "<h1><em>$title</em></h1>
<h2><em>$ep_title</em></h2>
<p><strong>Director(s): $directors</strong></p>
<p><strong>Released: $year&nbsp;</strong></p>
<p><strong>Genre: $genre</strong></p>
<p><strong>Number of Seasons: $seasons</strong></p>
<p><strong>Rating: $rating</strong></p>";
}


mysqli_close($con);
?>
