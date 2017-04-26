<?php
include('simple_html_dom.php');

/* Get searchTerm from POST parameters  */
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
$searchTerm = $data->searchTerm;
$search_query = urlencode($searchTerm);

    $html = file_get_html( "https://www.google.com/search?q=$search_query&tbm=isch" );
    $image_container = $html->find('img', 0)->src;
        echo $image_container;



?>
