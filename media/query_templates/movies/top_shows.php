<?php
    require_once('library.php');
    $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

echo "Top Movies in Horror";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Avg. Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Horror' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Comedy";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Comedy' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Family";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Comedy' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";

echo "Top Movies in Adventure";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Adventure' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Action";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Action' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Fantasy";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Fantasy' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Crime";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Crime' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Thriller";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Thriller' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Sports";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Sports' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Romance";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Romance' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
echo "</br>";
echo "Top Movies in Documentary";
    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Rating (1-5)</th></tr>";

    $result = mysqli_query($db_connection, "SELECT media_id, title, year_released, genre, avg(star_rating) AS rating FROM media NATURAL JOIN tv_show NATURAL JOIN watched WHERE genre = 'Documentary' ORDER BY rating DESC LIMIT 5");

    while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
	echo "<td>" . $row['rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($db_connection);
?>

