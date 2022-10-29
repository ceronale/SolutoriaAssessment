<?php

function getToken($url, $data = false)
{
    $curl = curl_init();
    $headr[] = 'Content-type: application/json';

    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headr);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $result = curl_exec($curl);
    $result = json_decode($result, true);
    curl_close($curl);
    return $result["token"];
}

function perform_http_request($token, $url, $data = false)
{
    $curl = curl_init();
    $headr = array();
    $headr[] = 'Content-length: 0';
    $headr[] = 'Content-type: application/json';
    $headr[] = 'Authorization: Bearer  ' . $token;

    if ($data) {
        $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headr);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}
