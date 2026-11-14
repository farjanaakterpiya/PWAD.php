<?php
$db = new mysqli("localhost", "root", "","jquery_crud");
$name = $_GET['name'];
$address = $_GET['add'];
$db->query("INSERT INTO students (name, address) VALUES ('$name', '$address')");

// Process the inserted data (e.g., save to database)
if($db->affected_rows ){
    echo "successfully Inserted";
}else{
    echo "Sorry, Something problem";
};

?>