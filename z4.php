<?php

function fetchPassword()
{
    $response = file_get_contents('https://api.adriatic.hr/test/it?user=620');
    return $response;
}

$password = fetchPassword();


$url = "https://api.adriatic.hr/test/it?user=620&pass=" . urlencode($password);


$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);


if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}


curl_close($ch);


file_put_contents('z4.odt', $response);

echo "Odt file spremljen u z4.odt";

?>