 
<?php
include('simple_html_dom.php');
$title = "Finding Nemo";
$search_keyword=str_replace(' ','+',$title);
$newhtml =file_get_html("https://www.google.com/search?q=".$search_keyword."&tbm=isch");
$result_image_source = $newhtml->find('img', 0)->src;
echo $result_image_source;
?>
