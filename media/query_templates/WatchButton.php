<?php
/* Functions that are used across multiple .php files */
class WatchButton{
  /* Get attributes to make button */
  public function addToList(){
    $watch_response = array();
    $watch_response['message']  = "Add to watch list";
    $watch_response['button']  = "btn btn-md btn-warning";
    $watch_response['glyphicon'] = "glyphicon glyphicon-star-empty";
    return $watch_response;
  }
  public function removeFromList(){
    $watch_response = array();
    $watch_response['message']  = "Remove from watch list";
    $watch_response['button']  = "btn btn-md btn-danger";
    $watch_response['glyphicon'] = "glyphicon glyphicon-star";
    return $watch_response;
  }
}
?>
