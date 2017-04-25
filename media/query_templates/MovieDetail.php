<?php
include_once("./library.php");
include('simple_html_dom.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$str = 10;
$sql="SELECT * FROM media";
$results = $con->query("SELECT  title, year_released, genre, movie_rating, duration, GROUP_CONCAT(first_name, ' ', last_name SEPARATOR ', ') AS 'directors' FROM media NATURAL JOIN movie NATURAL JOIN directs NATURAL JOIN director WHERE media_id = $str
") or die ("Invalid Query: " . $con->error());
$num_rows = $results->num_rows;
for ($row_iter = 0; $row_iter < $num_rows; $row_iter++) {
    $sql_row = $results->fetch_array();
    $title = $sql_row['title'];
    $year = $sql_row['year_released'];
    $genre = $sql_row['genre'];
    $rating = $sql_row['movie_rating'];
    $duration = $sql_row['duration'];
    $directors = $sql_row['directors'];
    $lname = $sql_row['last_name'];

$search_keyword=str_replace(' ','+',$title);
$newhtml =file_get_html("https://www.google.com/search?q=".$search_keyword."&tbm=isch");
$result_image_source = $newhtml->find('img', 0)->src;
echo '<img src="'.$result_image_source.'">';
     echo "<h1><em>$title</em></h1>
<p><strong>Director(s): $directors</strong></p>
<p><strong>Released: $year&nbsp;</strong></p>
<p><strong>Genre: $genre</strong></p>
<p>Rating: $rating</p>
<p>Duration: $duration</p>";

}


mysqli_close($con);
?>