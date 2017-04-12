<?php
    require_once('viewonly_permissions.php');
    $db_connection = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    if (mysqli_connect_errno()) {
        echo("Can't connect to MySQL Server. Error code: " . mysqli_connect_error());
        return null;
    }

    echo "<table class=\"table\"><tr><th>Title</th><th>Year Released</th><th>Genre</th><th>Avg. Rating</th></tr>";

    $result = mysqli_query($db_connection, "SELECT * FROM top_five_shows");

    $url = "media/#!/movies/";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><a href=\"" . $url . $row['media_id']  . "\">" . $row['title'] . "</a></td>";
        echo "<td>" . $row['year_released'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "<td>" . $row['avg_rating'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    mysqli_close($db_connection);
?>
