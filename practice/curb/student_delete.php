<?php
include_once("dbconfig.php");
$Roll = $_GET['Roll'];
$conn->query("DELETE FROM student WHERE Roll = '$Roll'");
if ($conn->affected_rows){
    header("Location: index.php");
}
?>