<?php
#Return user_id if logged in
session_start();
if ($_SESSION['userID']):
  $user_id = $_SESSION['userID'];
  echo "$user_id";
else:
  echo "-1";
endif;

?>
