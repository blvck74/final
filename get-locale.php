<?php
header('Content-Type: text/plain');
$current_language = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en_US';
echo $current_language;
?>
