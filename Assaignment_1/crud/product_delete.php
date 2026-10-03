<?php
include_once("dbconfig.php");
$id = $_GET['id'];
$conn->query("DELETE FROM product_list WHERE id = '$id'");
if ($conn->affected_rows){
    header("Location: index.php");
}
?>