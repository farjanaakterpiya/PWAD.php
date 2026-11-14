<?php
$db = new mysqli("localhost", "root", "", "jquery_dropdown");
$id = $_GET['distid'];
$raw = $db->query("SELECT * FORM upazillas WHERE dist_id='$id'");

$options= "";
while($row = $raw->fetch_object()){
    $options .= "<option?>$row->upazilla</option>";
}
?>