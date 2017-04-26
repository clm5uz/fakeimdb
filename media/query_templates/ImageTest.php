<?php
include('simple_html_dom.php');

    $search_query = "Finding Nemo";
    $search_query = urlencode( $search_query );
    $html = file_get_html( "https://www.google.com/search?q=$search_query&tbm=isch" );
    $image_container = $html->find('img', 0)->src;
        echo '<img src="'.$image_container.'" width="160" height="200">';



?>
