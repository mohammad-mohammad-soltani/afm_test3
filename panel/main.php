<?php
$text = "a boy";
$goApiKey = "1520e2fe77287cdbbff3898ed08c5c73ec7a61acae93f51040818dc8590b1c0c";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.midjourneyapi.xyz/mj/v2/imagine');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"prompt\":\" ".urlencode($text)." \",\"process_mode\":\"fast\"}");

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'X-Api-Key: '.$goApiKey;
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$image = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$data = json_decode($image, true);

print_r($data);