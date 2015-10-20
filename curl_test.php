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
foreach ($options as $option => $value) {
    $test->ch_setopt($option, $value);
}
$test->ch_exec();
$test->ch_close();
echo $test->get_code() . chr(10) . $test->get_header() . chr(10);
