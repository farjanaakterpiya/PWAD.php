<?php
$file = '../myfile.txt';
$timestamp = fileatime($file);
echo date("Y m d G:i:s", $timestamp);
?>