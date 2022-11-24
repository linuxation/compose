<?php
function test_connection($server) {
    $ch = curl_init("http://$server:5000");
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,4);
    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpcode == 200;
}

function load_students($server) {
    $ch = curl_init("http://$server:5000/api/list");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT,4);
    $json = curl_exec($ch);
    $data = json_decode($json, true);
    $output = array();
    if( !is_array( $data ) ) return;
    foreach ($data as $student) {
        if( key_exists('name', $student) )
            $output[] = $student['name'];
    }
    return $output;
}
