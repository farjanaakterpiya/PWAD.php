<?php
$host = "localhost";
$user = "root";
$pass ="";
$db ="PWAD73";
$conn = new mysqli($host,$user,$pass,$db);
if(!$conn){
    die("Database connected is failed:" . mysqli_connect_error());
}
?>