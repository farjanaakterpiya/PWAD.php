<?php
//$data = file("myfile.txt");
//print_r($data);
$users = file("users.txt");
//echo "<pre>";
 //print_r($users);
 
 foreach($users as $usr){
    //echo $usr . "<br>";
    list ($name, $email) = explode(" ", $usr);
    //echo "Name: $name Email:$email <br>";
    echo "<a href =\"mailto:$email\">$name</a> |";
 }
 
 
?>
<a href="mailto:abc@gmail.com">Rahim</a>