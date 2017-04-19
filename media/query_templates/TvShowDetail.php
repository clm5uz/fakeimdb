<?php
    require_once('library.php');
    $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

$str = 16;

$results = mysqli_query($db_connection, "SELECT *, GROUP_CONCAT(first_name, ' ', last_name SEPARATOR ', ') AS 'directors'  FROM media NATURAL JOIN tv_show NATURAL JOIN directs NATURAL JOIN director WHERE media_id = $str;");

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
<p><strong>Director(s): $directors</strong></p>
<p><strong>Released: $year&nbsp;</strong></p>
<p><strong>Genre: $genre</strong></p>
<p><strong>Number of Seasons: $seasons</strong></p>
<p><strong>Rating: $rating</strong></p>";

}


echo "</br> <h2><em>List of Episodes</em></h2></br>";

    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Season</th><th>Episode</th><th>Duration</th></tr>";

    $result = mysqli_query($db_connection, "SELECT * FROM episode NATURAL JOIN tv_show WHERE media_id = $str ORDER BY season,episode;");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['season'] . "</td>";
        echo "<td>" . $row['episode'] . "</td>";
        echo "<td>" . $row['duration'] . "</td>";

        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
mysqli_close($con);
?>
