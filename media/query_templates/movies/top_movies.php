<?php
    require_once('library.php');
    $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

echo "Top Movies in Horror";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Avg. Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Horror' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Comedy";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Comedy' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Family";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Comedy' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";

echo "Top Movies in Adventure";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Adventure' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Action";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Action' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Fantasy";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Fantasy' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Crime";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Crime' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Thriller";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Thriller' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Sports";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Sports' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Romance";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Romance' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Documentary";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, movie_rating FROM media NATURAL JOIN movie WHERE genre = 'Documentary' ORDER BY movie_rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['movie_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($db_connection);
?>

