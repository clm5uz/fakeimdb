<?php

$searchTermEncoded = urlencode("It's Always Sunny In Philedeplhia");
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

//echo $content;

$images = json_decode($result, true);
//print_r ($images);
$ground0 = $images['value'][0]['thumbnailUrl'];
echo $ground0;

curl_close($ch);
?>
