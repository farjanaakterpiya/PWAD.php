<?php
$path = 'D:\Xampp\htdocs\PWAD.php \05octo\myfile.text';
$info = pathinfo($path);
echo "<pre>";
print_r($info);
echo $info['basename'];
echo "<br>";
echo $info['dirname'];
?>