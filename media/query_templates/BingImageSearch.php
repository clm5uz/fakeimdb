<?php
/* Get searchTerm from POST parameters  */
$post_date = file_get_contents("php://input");
$data = json_decode($post_date);
$searchTerm = $data->searchTerm;
$searchTermEncoded = urlencode($searchTerm);

/* cURL the search term */
require_once('libcurl/libcurlemu.inc.php');
$sURL = "https://api.cognitive.microsoft.com/bing/v5.0/images/search?q=$searchTermEncoded";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $sURL);
curl_setopt($ch, CURLOPT_TIMEOUT, '1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: multipart/form-data',
    'Ocp-Apim-Subscription-Key: 1e8b6921022d48f691cb078b69809666'
));
$result = curl_exec($ch);

/* decode the JSON data  and echo the results */
$images = json_decode($result, true);
$thumbnailUrl = $images['value'][0]['thumbnailUrl'];
echo $thumbnailUrl;

/* Close connection */
curl_close($ch);
?>
