<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "college";

$conn = new mysqli($host,$user,$pass,$db);
if(!$conn){
    die("Database connected is failed:" . mysqli_connected_error());
    
}
?>

