#!/usr/bin/php -q
<?php

include('classes/CurlRequest.php');

$options = array(
    CURLOPT_URL => "http://posttestserver.com/post.php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => array(
        "Key1" => "Value1",
        "Key2" => "Value2"
    )
);

$test = new CurlRequest($options);
echo $test->get_code() . chr(10) . $test->get_header() . chr(10);
