<?php
    require_once('media/library.php');
    $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        return null;
    }

    echo "<table class=\"table table-bordered\"><tr><th>Title</th><th>Year Released</th><th>Genre</th></tr>";

    $result = mysqli_query($db_connection,"SELECT * FROM media NATURAL JOIN tv_show ORDER BY title");

    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($db_connection);
?>
