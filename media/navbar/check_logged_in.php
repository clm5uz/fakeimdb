<?php
        session_start();
        if ($_SESSION['loggedIn'] == 1) {
                echo "true";
        } else {
                echo "false";
        }
?>
