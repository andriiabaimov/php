#!/usr/bin/php -q
<?php

include('classes/ImapRequest.php');

$host="{imap.gmail.com:993/imap/ssl}";
$user="username";
$pass="password";

$gmail = new ImapRequest($host, $user, $pass);
$folders = $gmail->get_folders();

// Repeat until user decides to exit
do {
    // Output folders list
    foreach ($folders as $key => $folder) {
        echo $key.": ".mb_convert_encoding($folder,"UTF-8","UTF7-IMAP").chr(10);
    }

    // Ask in terminal where to go
    $where = readline('Where to go? (x for exit)? ');

    // If there is such folder - go there and list all headers and bodies
    if (array_key_exists($where, $folders)) {
        $gmail->to_folder($folders[$where]);
        $messages = $gmail->get_messages();
        foreach ($messages as $message_number) {
            echo $gmail->get_header($message_number);
            echo $gmail->get_body($message_number);
        }
    } else {
        echo "I don't understand the direction!" . chr(10);
    }
} while ($where != 'x');

$gmail->close();
